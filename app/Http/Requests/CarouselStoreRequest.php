<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CarouselStoreRequest extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10',
            'image' => 'required|image|mimes:jpg,png,webp'
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'Sarlavha Kiritilish Majburiy',
            'title.min' => 'Sarlavha Kamida 5ta So\'zdan Iborat Bo\'lishi kerak',
            'title.max' => 'Sarlavha 255ta Belgidan Ko\'p Bo\'lmasligi kerak',

            'content.required' => 'Content Kiritilish Majburiy',
            'content.min' => 'Content Kamida 10ta So\'zdan Iborat Bo\'lishi kerak',

            'image.required' => 'Rasm Kiritilish Majburiy',
            'image.image' => 'Rasm Rasm Farmatda Bo\'lishi Kerak',
            'image.mimes' => 'Rasm Faqat jpg,png,webp Formatda Bo\'lishi Mumkun'
        ];
    }
}
