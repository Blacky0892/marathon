<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'name' => 'required',
            //'post' => 'required',
            //'fio' => 'required',
            'oo' => 'required',
            'phone' => ['required', 'regex:/^(\+7|7|8)?[\s\-]?\(?[0-9][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)],
            //'fullName.*' => ['required'],
            //'shortName.*' => ['required'],
            //'area.*' => ['required'],
            //'mrsd.*' => ['required'],
            'school.*' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Заполните ФИО',
            //'post.required' => 'Заполните должность',
            'email.required' => 'Заполните email',
            'oo.required' => 'Заполните ОО',
            //'fio.required' => 'Заполните ФИО',
            'email.email' => 'Введите корректный email',
            'email.unique' => 'Уже существует пользователь с данным email',
            'phone.required' => 'Заполните телефон',
            'phone.regex' => 'Введите действительный номер телефона',
            'password.required' => 'Укажите пароль',
            'password.confirmed' => 'Пароль и повтор должны совпадать',
            'password.min' => 'Пароль должен содержать как минимум :min символов',
            //'fullName.*.required' => 'Заполните полное название',
            //'shortName.*.required' => 'Заполните краткое название',
            //'area.*.required' => 'Выберите округ',
            //'mrsd.*.required' => 'Заполните МРСД',
            //'school.*.required' => 'Выберите ОО',
        ];
    }
}
