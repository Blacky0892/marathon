<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\RedirectUsers;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\View\View;

class ResetPasswordController extends Controller
{
    use RedirectUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Отображение формы с запросом на восстановление
     *
     * @return View
     */
    public function showLinkRequestForm(): View
    {
        return view('auth.passwords.email');
    }

    /**
     * Отправка ссылки на восстановление
     *
     * @param  Request  $request
     * @return RedirectResponse|JsonResponse
     * @throws ValidationException
     */
    public function sendResetLinkEmail(Request $request): JsonResponse|RedirectResponse
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Валидация email
     *
     * @param  Request  $request
     * @return void
     */
    protected function validateEmail(Request $request): void
    {
        $request->validate(['email' => 'required|email']);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    public function broker(): PasswordBroker
    {
        return Password::broker();
    }

    /**
     * Данные для восстановления из формы
     *
     * @param  Request  $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    /**
     * Ответ с успешной отправкой
     *
     * @param  Request  $request
     * @param  string  $response
     * @return RedirectResponse|JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response): JsonResponse|RedirectResponse
    {
        return $request->wantsJson()
            ? new JsonResponse(['message' => trans($response)], 200)
            : back()->with('status', trans($response));
    }

    /**
     * Ответ с неудачей
     *
     * @param  Request  $request
     * @param  string  $response
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    protected function sendResetLinkFailedResponse(Request $request, $response): RedirectResponse
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

    /**
     * Страница с формой сброса пароля
     * @param  Request  $request
     * @return View
     */
    public function showResetForm(Request $request): View
    {
        $token = $request->route()->parameter('token');

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    /**
     * Сброос пароля
     *
     * @param  Request  $request
     * @return JsonResponse|RedirectResponse
     * @throws ValidationException
     */
    public function reset(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(

            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Правила для пароля
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'token'    => 'required',
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)],
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages(): array
    {
        return [];
    }

    /**
     * Процесс сброса пароля
     *
     * @param  CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword(CanResetPassword $user, string $password): void
    {
        $user->offsetUnset('email');
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    /**
     * Установка пароля пользователя
     *
     * @param  CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function setUserPassword(CanResetPassword $user, string $password): void
    {
        $user->password = Hash::make($password);
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard();
    }

    /**
     * Ответ с успешным сбросом пароля
     *
     * @param  Request  $request
     * @param  string  $response
     * @return RedirectResponse|JsonResponse
     */
    protected function sendResetResponse(Request $request, string $response): JsonResponse|RedirectResponse
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }

        return redirect($this->redirectPath())
            ->with('status', trans($response));
    }

    /**
     * Ответ с неудачным сбросом
     *
     * @param  Request  $request
     * @param  string  $response
     * @return RedirectResponse|JsonResponse
     * @throws ValidationException
     */
    protected function sendResetFailedResponse(Request $request, $response): JsonResponse|RedirectResponse
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'password' => [trans($response)],
            ]);
        }

        return redirect()->back()
            ->withInput($request->only('password'))
            ->withErrors(['password' => trans($response)]);
    }
}
