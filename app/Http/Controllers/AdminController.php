<?php

namespace App\Http\Controllers;

use App\Models\Nomination;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function createExpert(): View
    {
        $nominations = Nomination::all();
        return view('admin.createExpert', compact('nominations'));
    }

    public function storeExpert(Request $request)
    {
        $password = Str::random(10);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $user->roles()->attach(Role::firstWhere('slug', 'expert'));

        foreach ($request->nominations as $nomination)
        {
            $user->nominations()->attach($nomination);
        }

        $user->notify(new NewUser($request->email, $password));

        return redirect()->route('home');
    }

    public function orderToExpert($nomination)
    {
        $orders = Order::whereHas('nomination', function ($n) use ($nomination){
            $n->where('slug', $nomination);
        })
            ->whereDoesntHave('programs', function ($program) use ($nomination){
                $program->where('type', $nomination);
            })
            ->get();

        foreach ($orders as $order)
        {
            $experts = User::whereHas('roles', function ($role) {
                $role->where('slug', 'expert');
            })
                ->with('programs')
                ->whereHas('nominations', function ($nom) use ($nomination) {
                    $nom->where('slug', $nomination);
                });

            $experts = $experts->get();

            foreach ($experts as $expert){
                $counts[$expert->id] = $expert->programs->where('type', $nomination)->count();
            }

            uasort($counts, function($a, $b){
                if($a == $b){
                    return rand(-1, 1);
                }
                return $a < $b ? -1 : 1;
            });
            $randomExperts = array_slice(array_keys($counts),0,3);

            foreach ($randomExperts as $expert){
                $experts->find($expert)->programs()->create([
                    'order_id' => $order->id,
                    'type' => $nomination
                ]);
            }
        }

        echo 'Done';
    }
}
