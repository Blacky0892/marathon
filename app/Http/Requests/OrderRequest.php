<?php

namespace App\Http\Requests;

use App\Rules\Youtube;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'order' => ['file', 'mimes:pdf', 'max:5120'],
            'application' => ['file', 'mimes:pdf', 'max:5120'],
            #'poster' => ['file', 'mimes:jpg,jpeg', 'max:5120'],
            'poster' => ['nullable','url'],
            'poster_link' => ['nullable','url'],
            #'trailer' => [new Youtube],
            'trailer_link' => ['nullable','url'],
            #'program' => [new Youtube],
            'route' => ['file', 'mimes:pdf', 'max:5120'],
            'quiz' => ['file', 'mimes:pdf', 'max:5120'],
            #'video' => [new Youtube],
        ];
    }

    public function messages(): array
    {
        return [
            'order.file' => 'Заявка должна быть файлом',
            'order.mimes' => 'Заявка должна быть в формате PDF',
            'order.max' => 'Максимальный размер заявки 5 Мб',
            'application.file' => 'Приложение должно быть файлом',
            'application.mimes' => 'Приложение должно быть в формате PDF',
            'application.max' => 'Максимальный размер приложения 5 Мб',
            #'poster.file' => 'Афиша должна быть файлом',
            #'poster.mimes' => 'Афиша должна быть в формате JPG',
            #'poster.max' => 'Максимальный размер афиши 5 Мб',
            'poster.url' => 'Некорректная ссылка',
            'poster_link.url' => 'Некорректная ссылка',
            'trailer_link.url' => 'Некорректная ссылка',
            'route.file' => 'Маршрут должен быть файлом',
            'route.mimes' => 'Маршрут должен быть в формате PDF',
            'route.max' => 'Максимальный размер маршрута 5 Мб',
            'quiz.file' => 'Викторина должна быть файлом',
            'quiz.mimes' => 'Викторина должна быть в формате PDF',
            'quiz.max' => 'Максимальный размер викторины 5 Мб',
        ];
    }
}
