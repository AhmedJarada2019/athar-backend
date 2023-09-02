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

    'accepted'             => 'يجب قبول :attribute.',
    'accepted_if'          => 'يجب قبول :attribute عندما يكون :other هو :value.',
    'active_url'           => 'حقل :attribute ليس عنوان URL صحيحًا.',
    'after'                => 'يجب أن يكون :attribute تاريخًا بعد :date.',
    'after_or_equal'       => 'يجب أن يكون :attribute تاريخًا بعد أو يساوي :date.',
    'alpha'                => 'يجب أن يحتوي :attribute على أحرف فقط.',
    'alpha_dash'           => 'يجب أن يحتوي :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط.',
    'array'                => 'يجب أن يكون :attribute مصفوفة.',
    'before'               => 'يجب أن يكون :attribute تاريخًا قبل :date.',
    'before_or_equal'      => 'يجب أن يكون :attribute تاريخًا قبل أو يساوي :date.',
    'between'              => [
        'array'   => 'يجب أن يحتوي :attribute على بين :min و :max عنصر.',
        'file'    => 'يجب أن يكون حجم :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
        'string'  => 'يجب أن يكون طول :attribute بين :min و :max حرف.',
    ],
    'boolean'              => 'يجب أن يكون حقل :attribute صحيحًا أو خاطئًا.',
    'confirmed'            => 'تأكيد :attribute غير متطابق.',
    'current_password'     => 'كلمة المرور غير صحيحة.',
    'date'                 => 'حقل :attribute ليس تاريخًا صحيحًا.',
    'date_equals'          => 'يجب أن يكون :attribute تاريخًا يساوي :date.',
    'date_format'          => 'حقل :attribute لا يتوافق مع التنسيق :format.',
    'declined'             => 'يجب رفض :attribute.',
    'declined_if'          => 'يجب رفض :attribute عندما يكون :other هو :value.',
    'different'            => 'يجب أن يكون :attribute و :other مختلفين.',
    'digits'               => 'يجب أن يحتوي :attribute على :digits أرقام.',
    'digits_between'       => 'يجب أن يكون طول :attribute بين :min و :max أرقام.',
    'dimensions'           => 'حقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'حقل :attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with'      => 'قد لا ينتهي :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with'    => 'قد لا يبدأ :attribute بأحد القيم التالية: :values.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with'            => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values.',
    'enum'                 => 'القيمة المحددة :attribute غير صالحة.',
    'exists'               => 'القيمة المحددة :attribute غير صالحة.',
    'file'                 => 'يجب أن يكون :attribute ملفًا.',
    'filled'               => 'يجب أن يحتوي حقل :attribute على قيمة.',
    'gt'                   => [
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عنصر.',
        'file'    => 'يجب أن يكون حجم :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
        'string'  => 'يجب أن يكون طول :attribute أكبر من :value حرف.',
    ],
    'gte'                  => [
        'array'   => 'يجب أن يحتوي :attribute على :value عنصر أو أكثر.',
        'file'    => 'يجب أن يكون حجم :attribute أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
        'string'  => 'يجب أن يكون طول :attribute أكبر من أو يساوي :value حرف.',
    ],
    'image'                => 'يجب أن يكون :attribute صورة.',
    'in'                   => 'القيمة المحددة :attribute غير صالحة.',
    'in_array'             => 'حقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صحيحًا.',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون :attribute سلسلة JSON صحيحة.',
    'lt'                   => [
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عنصر.',
        'file'    => 'يجب أن يكون حجم :attribute أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute أقل من :value.',
        'string'  => 'يجب أن يكون طول :attribute أقل من :value حرف.',
    ],
    'lte'                  => [
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :value عنصر.',
        'file'    => 'يجب أن يكون حجم :attribute أصغر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute أقل من أو يساوي :value.',
        'string'  => 'يجب أن يكون طول :attribute أقل من أو يساوي :value حرف.',
    ],
    'mac_address'          => 'يجب أن يكون :attribute عنوان MAC صحيحًا.',
    'max'                  => [
        'array'   => 'يجب ألا يحتوي :attribute على أكثر من :max عنصر.',
        'file'    => 'يجب ألا يكون حجم :attribute أكبر من :max كيلوبايت.',
        'numeric' => 'يجب ألا يكون :attribute أكبر من :max.',
        'string'  => 'يجب ألا يكون طول :attribute أكبر من :max حرف.',
    ],
    'max_digits'           => 'يجب ألا يحتوي :attribute على أكثر من :max أرقام.',
    'mimes'                => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'mimetypes'            => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'min'                  => [
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عنصر.',
        'file'    => 'يجب أن يكون حجم :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
        'string'  => 'يجب أن يكون طول :attribute على الأقل :min حرف.',
    ],
    'min_digits'           => 'يجب أن يحتوي :attribute على الأقل على :min أرقام.',
    'multiple_of'          => 'يجب أن يكون :attribute مضاعفًا لـ :value.',
    'not_in'               => 'القيمة المحددة :attribute غير صالحة.',
    'not_regex'            => 'تنسيق :attribute غير صالح.',
    'numeric'              => 'يجب أن يكون :attribute رقمًا.',
    'password'             => [
        'letters'       => 'يجب أن يحتوي :attribute على حرف واحد على الأقل.',
        'mixed'         => 'يجب أن يحتوي :attribute على حرف كبير وحرف صغير واحد على الأقل.',
        'numbers'       => 'يجب أن يحتوي :attribute على رقم واحد على الأقل.',
        'symbols'       => 'يجب أن يحتوي :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'تم ظهور :attribute المعطى في تسريب بيانات. يرجى اختيار :attribute مختلفة.',
    ],
    'present'              => 'يجب أن يكون حقل :attribute موجودًا.',
    'prohibited'           => 'حقل :attribute محظور.',
    'prohibited_if'        => 'حقل :attribute محظور عندما يكون :other هو :value.',
    'prohibited_unless'    => 'حقل :attribute محظور ما لم يكن :other في :values.',
    'prohibits'            => 'حقل :attribute يحظر وجود :other.',
    'regex'                => 'تنسيق :attribute غير صالح.',
    'required'             => 'حقل :attribute مطلوب.',
    'required_array_keys'  => 'حقل :attribute يجب أن يحتوي على مفاتيح القيمة التالية: :values.',
    'required_if'          => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_unless'      => 'حقل :attribute مطلوب ما لم يكن :other في :values.',
    'required_with'        => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all'    => 'حقل :attribute مطلوب عندما تكون :values موجودًا.',
    'required_without'     => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا يكون أي من :values موجودًا.',
    'same'                 => 'يجب أن يتطابق :attribute و :other.',
    'size'                 => [
        'array'   => 'يجب أن يحتوي :attribute على :size عنصر.',
        'file'    => 'يجب أن يكون حجم :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute :size.',
        'string'  => 'يجب أن يكون طول :attribute :size حرف.',
    ],
    'starts_with'          => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values.',
    'string'               => 'يجب أن يكون :attribute سلسلة نصية.',
    'timezone'             => 'يجب أن يكون :attribute منطقة زمنية صالحة.',
    'unique'               => 'تم أخذ :attribute بالفعل.',
    'uploaded'             => 'فشل تحميل :attribute.',
    'url'                  => 'يجب أن يكون :attribute عنوان URL صالحًا.',
    'uuid'                 => 'يجب أن يكون :attribute UUID صالحًا.',

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
        'password'          => 'كلمة المرور',
        'mobile'            => 'رقم الهاتف',
        'name'              => 'الاسم',
        'first_name'        => 'الاسم الأول',
        'last_name'         => 'الاسم الاخير',
        'code'              => 'رمز التفعيل',
        'email'             => 'البريد الالكتروني',
        'birthday'          => 'تاريخ الميلاد',
        'current_password'  => 'كلمة المرور الحالية',
        'national_identity' => 'الهوية الوطنية',
    ],

];

