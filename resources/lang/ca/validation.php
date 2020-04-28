<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'        => ':attribute ha de ser acceptat.',
    'active_url'      => ':attribute no és una URL vàlida.',
    'after'           => ':attribute ha de ser una data posterior a :date.',
    'after_or_equal'  => ':attribute ha de ser una data posterior o igual a :date.',
    'alpha'           => ':attribute nomes ha de contenir lletres.',
    'alpha_dash'      => ':attribute nomes ha de contenir lletres, números i guions.',
    'alpha_num'       => ':attribute nomes ha de contenir lletres i números.',
    'array'           => ':attribute ha de ser un conjunt.',
    'before'          => ':attribute ha de ser una data anterior a :date.',
    'before_or_equal' => ':attribute ha de ser una data anterior o igual a :date.',
    'between'         => [
        'numeric' => ':attribute ha d\'estar entre :min - :max.',
        'file'    => ':attribute he de pesar entre :min - :max kilobytes.',
        'string'  => ':attribute ha d\'estar entre :min - :max caracteres.',
        'array'   => ':attribute  ha d\'estar entre :min - :max ítems.',
    ],
    'boolean'        => 'El camp :attribute ha de tenir un valor cert o fals.',
    'confirmed'      => 'La confirmació de :attribute no coincideix.',
    'date'           => ':attribute no es una data vàlida.',
    'date_equals'    => ':attribute he de ser una data igual a :date.',
    'date_format'    => ':attribute no correspon al format :format.',
    'different'      => ':attribute y :other han ser diferents.',
    'digits'         => ':attribute ha de tenir :digits dígits.',
    'digits_between' => ':attribute ha de tenir entre :min y :max dígits.',
    'dimensions'     => 'Les dimensions de la imatge :attribute no son vàlides.',
    'distinct'       => 'El camp :attribute conté un valor duplicat.',
    'email'          => ':attribute no és un correu vàlid',
    'ends_with'      => 'El camp :attribute ha de finalitzar amb un dels sigüents valors: :values',
    'exists'         => ':attribute no és vàlid.',
    'file'           => 'El camp :attribute ha de ser un arxiu.',
    'filled'         => 'El camp :attribute és obligatori.',
    'gt'             => [
        'numeric' => 'El camp :attribute ha de ser més gran que :value.',
        'file'    => 'El camp :attribute ha de tenir més de :value kilobytes.',
        'string'  => 'El camp :attribute ha de tenir més de :value caràcters.',
        'array'   => 'El camp :attribute ha de tenir més :value elements.',
    ],
    'gte' => [
        'numeric' => 'El camp :attribute ha de ser com a  mínim :value.',
        'file'    => 'El camp :attribute ha de tenir com mínim :value kilobytes.',
        'string'  => 'El camp :attribute ha de tenir com mínim :value caràcters.',
        'array'   => 'El camp :attribute ha de tenir com mínim :value elements.',
    ],
    'image'    => ':attribute ha de ser una imatge.',
    'in'       => ':attribute no és vàlid.',
    'in_array' => 'El campo :attribute no existeix en :other.',
    'integer'  => ':attribute ha de ser un número enter.',
    'ip'       => ':attribute ha de ser una direcció IP vàlida.',
    'ipv4'     => ':attribute ha de ser un direcció IPv4 vàlida',
    'ipv6'     => ':attribute ha de ser un direcció IPv6 vàlida.',
    'json'     => 'El camp :attribute ha de tenir una cadena JSON vàlida.',
    'lt'       => [
        'numeric' => 'El camp :attribute ha de ser menor que :value.',
        'file'    => 'El camp :attribute ha de tenir menys de :value kilobytes.',
        'string'  => 'El camp :attribute ha de tenir menys de :value caràcters.',
        'array'   => 'El camp :attribute ha de tenir menys de :value elements.',
    ],
    'lte' => [
        'numeric' => 'El camp :attribute ha de ser como màxim :value.',
        'file'    => 'El camp :attribute ha de tenir com a màxim :value kilobytes.',
        'string'  => 'El camp :attribute ha de tenir com a màxim :value caràcters.',
        'array'   => 'El camp :attribute ha de tenir com a màxim :value elements.',
    ],
    'max' => [
        'numeric' => ':attribute no ha de ser més gran a :max.',
        'file'    => ':attribute no ha de ser més gran que :max kilobytes.',
        'string'  => ':attribute no ha de ser més gran que :max caràcters.',
        'array'   => ':attribute no ha de tenir més de :max elements.',
    ],
    'mimes'     => ':attribute ha de ser un arxiu amb format: :values.',
    'mimetypes' => ':attribute ha de ser un arxiu amb format: :values.',
    'min'       => [
        'numeric' => 'La mida de :attribute ha de ser de almenys :min.',
        'file'    => 'La mida de :attribute ha de ser de almenys :min kilobytes.',
        'string'  => ':attribute ha de contenir almenys :min caràcters.',
        'array'   => ':attribute ha de tenir almenys :min elements.',
    ],
    'not_in'               => ':attribute no és vàlid.',
    'not_regex'            => 'El format del camp :attribute es vàlid.',
    'numeric'              => ':attribute ha  de ser numéric.',
    'password'             => 'La contrasenya no és correcte.',
    'present'              => 'El camp :attribute ha d\'estar present.',
    'regex'                => 'El format de :attribute no és vàlid.',
    'required'             => 'El camp :attribute és obligatori.',
    // Custom
    'required_identifier'  => 'El camp Identificador és obligatori.',

    'required_if'          => 'El camp :attribute és obligatori quan :other es :value.',
    'required_unless'      => 'El camp :attribute és obligatori a menys que :other esté en :values.',
    'required_with'        => 'El camp :attribute és obligatori quan :values està present.',
    'required_with_all'    => 'El camp :attribute és obligatori quan :values està present.',
    'required_without'     => 'El camp :attribute és obligatori quan :values no està present.',
    'required_without_all' => 'El camp :attribute és obligatori quan cap dels :values estiguin presents.',
    'same'                 => ':attribute y :other han de coincidir.',
    'size'                 => [
        'numeric' => 'La mida de :attribute ha de ser :size.',
        'file'    => 'La mida de :attribute ha de ser :size kilobytes.',
        'string'  => ':attribute ha de contenir :size caràcters.',
        'array'   => ':attribute ha de contenir :size elements.',
    ],
    'starts_with' => 'El camp :attribute ha de començar amb un dels següents valors: :values',
    'string'      => 'El camp :attribute ha de ser una cadena de caràcters.',
    'timezone'    => 'El :attribute ha de ser una zona vàlida.',
    'unique'      => 'El camp :attribute ja ha estat registrat.',
    'uploaded'    => 'Pujar :attribute ha fallat.',
    'url'         => 'El format :attribute no és vàlid.',
    'uuid'        => 'El camp :attribute ha de ser un UUID vàlid.',
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
        'password' => [
            'min' => 'La :attribute ha de contenir més de :min caracteres',
        ],
        'email' => [
            'unique' => 'El :attribute ja ha estat registrat.',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'address'               => 'adreça',
        'age'                   => 'edat',
        'avatar'                => 'foto de perfil',
        'body'                  => 'contingut',
        'city'                  => 'ciutat',
        'content'               => 'contingut',
        'country'               => 'país',
        'date'                  => 'data',
        'day'                   => 'dia',
        'description'           => 'descripció',
        'email'                 => 'correu electrònic',
        'excerpt'               => 'extracte',
        'first_name'            => 'nom',
        'gender'                => 'gènere',
        'hour'                  => 'hora',
        'last_name'             => 'cognom',
        'message'               => 'missatge',
        'minute'                => 'minut',
        'mobile'                => 'mòbil',
        'month'                 => 'mes',
        'name'                  => 'nom',
        'password'              => 'contrasenya',
        'password_confirmation' => 'confirmació de la contrasenya',
        'phone'                 => 'telèfon',
        'price'                 => 'preu',
        'second'                => 'segon',
        'sex'                   => 'sex',
        'subject'               => 'assumpte',
        'terms'                 => 'térmes',
        'time'                  => 'hora',
        'title'                 => 'títol',
        'username'              => 'usuari',
        'year'                  => 'any',
        'reply'                 => 'respondre comentari'
    ],
];
