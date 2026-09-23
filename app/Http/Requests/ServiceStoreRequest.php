<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
            'title' => 'required|min:5|max:255|string',
            'content' => 'required|min:10',
            'image' => 'nullable|mimes:png|required_without:icon|image|max:2048',
            'icon' => [
                'nullable', 'required_without:image', 'regex:/^(fa-solid|fa-regular|fa-brands|fa-duotone|fa-light|fa-thin|fas|far|fab)\s+fa-[a-z0-9-]+$/i'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Sarlavhani kiritish shart.',
            'title.min' => 'Sarlavha kamida 5 ta belgidan iborat bo\'lishi kerak.',
            'title.max' => 'Sarlavha 255 ta belgidan oshmasligi kerak.',

            'content.required' => 'Batafsil ma\'lumot kiritish shart.',
            'content.min' => 'Batafsil ma\'lumot kamida 10 ta belgidan iborat bo\'lishi kerak.',

            'image.required_without' => 'Icon tanlanmagan bo\'lsa, PNG rasm yuklanishi shart.',
            'image.image' => 'Yuklangan fayl rasm bo\'lishi kerak.',
            'image.mimes' => 'Rasm faqat PNG formatida bo\'lishi kerak.',
            'image.max' => 'Rasm hajmi 2MB dan oshmasligi kerak.',

            'icon.required_without' => 'Rasm yuklanmagan bo\'lsa, Icon kiritilishi shart.',
            'icon.string' => 'Icon nomi matn shaklida bo\'lishi kerak.',
            'icon.regex' => 'Noto\'g\'ri icon kiritildi. Masalan: "fa-solid fa-phone" yoki "fas fa-user" ko\'rinishida yozing.',
        ];
    }
}
