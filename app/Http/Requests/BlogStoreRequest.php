<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'title.en' => 'required|min:5|max:255|string',
            'title.ru' => 'required|min:5|max:255|string',
            'content' => 'required|array',
            'content.uz' => 'required|min:10|string',
            'content.ru' => 'required|min:10|string',
            'content.en' => 'required|min:10|string',
            'image' => 'image|mimes:png,jpg|max:2048|nullable',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ];
    }

    public function messages(): array {
        return [
            'title.required'=>'Sarlavha bo`sh bo`lishi mumkin emas',
            'title.min'=>'Sarlavha kamida 5 ta belgidan iborat bo`lishi kerak',
            'content.required'=>'Kontent bo`sh bo`lishi mumkin emas',
            'content.min'=>'Kontent kamida 10 ta belgidan iborat bo`lishi kerak',
            'image.image'=>'Rasm fayli bo`lishi kerak',
            'image.mimes'=>'Rasm fayli jpg yoki png formatida bo`lishi kerak',
            'image.max'=>'Rasm fayli 2MB dan katta bo`lmasligi kerak',
            'category_id.required'=>'Kategoriya tanlanishi shart',
            'category_id.exists'=>'Tanlangan kategoriya mavjud emas',
            'tags.array'=>'Teglar massiv bo`lishi kerak',
            'tags.*.exists'=>'Tanlangan teg mavjud emas'
        ];
    }
}
