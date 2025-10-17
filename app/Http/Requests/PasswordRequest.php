<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'currentPassword' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)]
        ];
    }

    public function messages(): array
    {
        return [
            'currentPassword.current_password' => 'Текущий пароль неверен',
            'currentPassword.required' => 'Укажите текущий пароль',
            'password.required' => 'Укажите новый пароль',
            'password.confirmed' => 'Пароль и повтор должны совпадать',
        ];
    }
}
