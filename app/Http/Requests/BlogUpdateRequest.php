<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
            'title' => 'required|array',
            'title.uz' => 'required|min:5|max:255|string',
            'title.ru' => 'required|min:5|max:255|string',
            'title.en' => 'required|min:5|max:255|string',
            'content' => 'required|array',
            'content.uz' => 'required|min:10|max:255|string',
            'content.ru' => 'required|min:10|max:255|string',
            'content.en' => 'required|min:10|max:255|string',
            'image' => 'mimes:png,jpg',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Sarlavha kiritilishi shart.',
            'title.min' => 'Sarlavha kamida 5 ta belgidan iborat bo‘lishi kerak.',
            'title.max' => 'Sarlavha 255 ta belgidan oshmasligi kerak.',
            'title.string' => 'Sarlavha matn ko‘rinishida bo‘lishi kerak.',

            'content.required' => 'Mazmun kiritilishi shart.',
            'content.min' => 'Mazmun kamida 10 ta belgidan iborat bo‘lishi kerak.',
            'content.max' => 'Mazmun 255 ta belgidan oshmasligi kerak.',
            'content.string' => 'Mazmun matn ko‘rinishida bo‘lishi kerak.',

            'image.mimes' => 'Rasm faqat PNG yoki JPG formatida bo‘lishi kerak.',

            'category_id.required' => 'Kategoriya tanlanishi shart.',
            'category_id.exists' => 'Tanlangan kategoriya mavjud emas.',

            'tags.array' => 'Teglar ro‘yxat ko‘rinishida bo‘lishi kerak.',
            'tags.*.exists' => 'Tanlangan teglar ichida mavjud bo‘lmagan teg bor.',
        ];
    }
}
