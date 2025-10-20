<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Area;
use App\Models\Role;
use App\Models\School;
use App\Models\User;
use App\Traits\RedirectUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use RedirectUsers;

    protected string $redirectTo = '/home';

    /**
     * Отображение формы регистрации
     * @return View
     */
    public function showRegisterForm(): View
    {
        $schools = School::all();

        return view('auth.register', compact('schools'));
    }

    /**
     * Процесс регистрации
     * @param  UserRequest  $request
     * @return JsonResponse|RedirectResponse
     */
    public function register(UserRequest $request): JsonResponse|RedirectResponse
    {
        // Вызываем событие регистрации, в котором отправляется email с подтверждением
        event(new Registered($user = $this->create($request->all())));
        // Авторизуемся в системе
        $this->guard()->login($user);

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Создаём пользователя и заявку
     * @param  array  $data
     * @return mixed
     */
    protected function create(array $data): mixed
    {
        // Создание нового пользователя
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'password' => Hash::make($data['password']),
            'school_id' => $data['oo'] ?? null,
        ]);

        // Назначение пользовательской роли
        $user->roles()->attach(Role::firstWhere('slug', 'user'));

        // Создание заявки для пользователя
        //$order = $user->order()->create();

        return $user;
    }

    /**
     * @return Guard|StatefulGuard
     */
    protected function guard(): Guard|StatefulGuard
    {
        return Auth::guard();
    }
}
