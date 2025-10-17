<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\RedirectUsers;
use App\Traits\ThrottlesLogins;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    use RedirectUsers, ThrottlesLogins;

    // Куда редиректим после авторизации
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Отображение формы входа
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Проесс входа
     * @param  Request  $request
     * @return JsonResponse|RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse|RedirectResponse
    {
        // Проверяем данные на валидность
        $this->validateLogin($request);

        $user = User::firstWhere($this->username(), $request->input($this->username()));

        if(!$user)
        {
            return $this->sendFailedLoginResponse();
        }

        /*if(!$user->active)
        {
            throw ValidationException::withMessages([$this->username() => 'Ваша учётная запис неактивна. Вход невозможен.']);
        }*/

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts')
            && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
        }

        // Пытаемся авторизоваться
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse();
    }

    /**
     * Проверка данных на валидность
     * @param  Request  $request
     * @return void
     */
    protected function validateLogin(Request $request): void
    {
        $request->validate(
            [
                $this->username() => 'required',
                'password'        => 'required',
            ],
            [
                $this->username().'.required' => 'Поле обязательно для заполнения',
                'password.required'           => 'Поле обязательно для заполнения',
            ]
        );
    }

    /**
     * Какое поле является логином
     * @return string
     */
    public function username(): string
    {
        return 'email';
    }

    /**
     * Попытка входа
     * @param  Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request): bool
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * @return Guard|StatefulGuard
     */
    protected function guard(): Guard|StatefulGuard
    {
        return Auth::guard();
    }

    /**
     * Данные, получаемые из формы для авторизации
     * @param  Request  $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Отправка успешного ответа
     * @param  Request  $request
     * @return JsonResponse|RedirectResponse
     */
    protected function sendLoginResponse(Request $request): JsonResponse|RedirectResponse
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    /**
     * Отправка ответа с ошибкой
     * @return mixed
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(): mixed
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Выход из системы
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('auth.login');
    }

}
