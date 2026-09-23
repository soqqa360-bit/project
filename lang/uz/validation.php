<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute qabul qilinishi kerak.',
    'accepted_if' => ':attribute :other :value bo‘lganda qabul qilinishi kerak.',
    'active_url' => ':attribute to‘g‘ri URL bo‘lishi kerak.',
    'after' => ':attribute :date sanasidan keyingi sana bo‘lishi kerak.',
    'after_or_equal' => ':attribute :date sanasidan keyingi yoki teng sana bo‘lishi kerak.',

    'alpha' => ':attribute faqat harflardan iborat bo‘lishi kerak.',
    'alpha_dash' => ':attribute faqat harflar, raqamlar, tire va pastki chiziqdan iborat bo‘lishi kerak.',
    'alpha_num' => ':attribute faqat harflar va raqamlardan iborat bo‘lishi kerak.',

    'array' => ':attribute massiv bo‘lishi kerak.',
    'ascii' => ':attribute faqat ASCII belgilaridan iborat bo‘lishi kerak.',

    'before' => ':attribute :date sanasidan oldingi sana bo‘lishi kerak.',
    'before_or_equal' => ':attribute :date sanasidan oldingi yoki teng sana bo‘lishi kerak.',

    'boolean' => ':attribute rost yoki yolg‘on qiymat bo‘lishi kerak.',
    'confirmed' => ':attribute tasdig‘i mos kelmaydi.',
    'current_password' => 'Parol noto‘g‘ri.',
    'date' => ':attribute to‘g‘ri sana bo‘lishi kerak.',
    'date_format' => ':attribute :format formatida bo‘lishi kerak.',

    'different' => ':attribute va :other bir-biridan farq qilishi kerak.',
    'digits' => ':attribute :digits xonali bo‘lishi kerak.',
    'digits_between' => ':attribute :min va :max xonali bo‘lishi kerak.',

    'dimensions' => ':attribute rasmining o‘lchamlari noto‘g‘ri.',
    'distinct' => ':attribute takroriy qiymatga ega.',

    'email' => ':attribute to‘g‘ri elektron pochta manzili bo‘lishi kerak.',
    'exists' => 'Tanlangan :attribute mavjud emas.',
    'file' => ':attribute fayl bo‘lishi kerak.',
    'filled' => ':attribute maydoni to‘ldirilishi kerak.',

    'image' => ':attribute rasm bo‘lishi kerak.',
    'integer' => ':attribute butun son bo‘lishi kerak.',
    'ip' => ':attribute to‘g‘ri IP manzil bo‘lishi kerak.',
    'ipv4' => ':attribute to‘g‘ri IPv4 manzil bo‘lishi kerak.',
    'ipv6' => ':attribute to‘g‘ri IPv6 manzil bo‘lishi kerak.',

    'json' => ':attribute to‘g‘ri JSON formatida bo‘lishi kerak.',
    'list' => ':attribute ro‘yxat bo‘lishi kerak.',
    'lowercase' => ':attribute faqat kichik harflarda bo‘lishi kerak.',

    'max' => [
        'array' => ':attribute :max tadan ortiq elementga ega bo‘lmasligi kerak.',
        'file' => ':attribute :max kilobaytdan katta bo‘lmasligi kerak.',
        'numeric' => ':attribute :max dan katta bo‘lmasligi kerak.',
        'string' => ':attribute :max ta belgidan oshmasligi kerak.',
    ],

    'mimes' => ':attribute quyidagi fayl turlaridan biri bo‘lishi kerak: :values.',
    'mimetypes' => ':attribute fayl turi quyidagilardan biri bo‘lishi kerak: :values.',

    'min' => [
        'array' => ':attribute kamida :min ta elementdan iborat bo‘lishi kerak.',
        'file' => ':attribute kamida :min kilobayt bo‘lishi kerak.',
        'numeric' => ':attribute kamida :min bo‘lishi kerak.',
        'string' => ':attribute kamida :min ta belgidan iborat bo‘lishi kerak.',
    ],

    'numeric' => ':attribute raqam bo‘lishi kerak.',

    'regex' => ':attribute formati noto‘g‘ri.',
    'required' => ':attribute kiritilishi majburiy.',
    'required_if' => ':attribute :other :value bo‘lganda kiritilishi majburiy.',
    'required_unless' => ':attribute :other qiymati :values bo‘lmaganda kiritilishi majburiy.',

    'same' => ':attribute :other bilan bir xil bo‘lishi kerak.',

    'string' => ':attribute matn bo‘lishi kerak.',
    'timezone' => ':attribute to‘g‘ri vaqt mintaqasi bo‘lishi kerak.',
    'unique' => 'Bunday :attribute allaqachon mavjud.',
    'uploaded' => ':attribute yuklanmadi.',
    'uppercase' => ':attribute katta harflarda bo‘lishi kerak.',
    'url' => ':attribute to‘g‘ri URL manzili bo‘lishi kerak.',
    'uuid' => ':attribute to‘g‘ri UUID bo‘lishi kerak.',
    'name.required' => 'Ism kiritilishi shart.',
    'name.string' => 'Ism matn ko‘rinishida bo‘lishi kerak.',
    'name.max' => 'Ism 255 ta belgidan oshmasligi kerak.',

    'email.required' => 'Email kiritilishi shart.',
    'email.string' => 'Email matn ko‘rinishida bo‘lishi kerak.',
    'email.max' => 'Email 255 ta belgidan oshmasligi kerak.',

    'subject.required' => 'Mavzu kiritilishi shart.',
    'subject.string' => 'Mavzu matn ko‘rinishida bo‘lishi kerak.',
    'subject.max' => 'Mavzu 255 ta belgidan oshmasligi kerak.',

    'message.required' => 'Xabar kiritilishi shart.',
    'message.string' => 'Xabar matn ko‘rinishida bo‘lishi kerak.',
    'message.min' => 'Xabar kamida 5 ta belgidan iborat bo‘lishi kerak.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'ism',
        'email' => 'elektron pochta',
        'subject' => 'mavzu',
        'message' => 'xabar',

        'title' => 'sarlavha',
        'content' => 'mazmun',
        'image' => 'rasm',
        'category_id' => 'kategoriya',
        'tags' => 'teglar',
        'comment' => 'izoh',

        'password' => 'parol',
        'password_confirmation' => 'parolni tasdiqlash',

        'g-recaptcha-response' => 'Captcha',

    ],

];
