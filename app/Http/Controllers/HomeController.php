<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\Area;
use App\Models\Nomination;
use App\Models\Order;
use App\Models\School;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Главная страница в зависимости от роли
     * @return View
     */
    public function home(): View|RedirectResponse
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return $this->adminHomePage();
        } elseif ($user->hasRole('moderator')) {
            return $this->moderatorHomePage();
        } elseif ($user->hasRole('expert')) {
            return $this->expertHomePage();
        } else {
            return $this->userHomePage();
        }
    }

    /**
     * Домашняя страница администратора
     * @return View
     */
    private function adminHomePage(): View
    {
        $experts = User::whereHas('roles', function ($role) {
            $role->where('slug', 'expert');
        })->get();

        return view('admin.home', compact('experts'));
    }

    /**
     * Страница модератора
     * @return View
     */
    private function moderatorHomePage(): RedirectResponse|View
    {
        return redirect()->route('moderator.orders');
    }

    /**
     * Страница эксперта
     * @return View
     */
    private function expertHomePage(): View
    {
        return view('expert.home');
    }

    /**
     * Страница пользователя
     * @return View
     */
    public function userHomePage(): View
    {

        $active = 'home';
        $user   = Auth::user();
        $schools = School::whereNotNull('mrsd')->orderBy('short_name')->get();
        $areas = Area::all();
        $nominations = Nomination::all();

        return view('user.home', compact('user', 'schools', 'areas', 'nominations', 'active'));
    }

    public function form2(Request $request)
    {
        return;
        Auth::user()->orders()->create([
            'stage' => 2,
            'area_id' => $request->area,
            'mrsd' => $request->mrsd,
            'school_id' => $request->school,
            'class' => $request->class,
            'count_student' => $request->count_student,
            'count_adult' => $request->count_adult,
            'link' => $request->link,
        ]);

        return back()->with(['notify_success' => 'Заявка успешно отправлена']);
    }

    /**
     * Страница смены пароля
     * @return View
     */
    public function password(): View
    {
        return view('passwords');
    }

    /**
     * Смена пароля
     * @param  PasswordRequest  $request
     * @return RedirectResponse
     */
    public function passwordChange(PasswordRequest $request): RedirectResponse
    {
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('settings.password')->with(['notify_success' => 'Пароль успешно изменён']);
    }

    /**
     * Страница со ссылками на конкурсные материалы
     * @return View
     */
    public function info(): View
    {
        $orders = Order::whereNotNull('poster')
            ->orWhereNotNull('quiz')
            ->orWhereNotNull('route')
            ->with('schools.school')
            ->get()
        ;

        return view('orders', compact('orders'));
    }
}
