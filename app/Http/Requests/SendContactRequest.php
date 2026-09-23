<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SendContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'subject' => 'required|string|max:255|min:5',
            'message' => 'required|string|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ism kiritilish majburiy',
            'name.max' => 'Ism 255ta belgidan ko\' bo\'lishi kerak emas',

            'email.required' => 'Email kiritilish majburiy',
            'email.max' => 'Email 255ta belgidan ko\' bo\'lishi kerak emas',
            'email.email' => 'Email bo\'lishi kerak',

            'subject.required' => 'Mavzu kiritilish majburiy',
            'subject.max' => 'Mavzu 255ta belgidan ko\' bo\'lishi kerak emas',
            'subject.min' => 'Mavzu kamida 5ta belgidan iborat bo\'lishi kerak',

            'message.required' => 'Xabar kiritilish majburiy',
            'message.min' => 'Xabar kamida 5ta belgidan iborat bo\'lishi kerak'
        ];
    }
}
