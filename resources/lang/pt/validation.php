<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | O following language lines conter O default error messages used by
    | O validator class. Some of Ose rules have multiple versions such
    | as O size rules. Feel free to tweak each of Ose messages here.
    |
    */

    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute é não uma URL válida.',
    'after'                => 'O campo :attribute deve ser uma data após :date.',
    'alpha'                => 'O campo :attribute pode apenas conter letras.',
    'alpha_dash'           => 'O campo :attribute pode apenas conter letras, números, e pontos.',
    'alpha_num'            => 'O campo :attribute pode apenas conter letras e números.',
    'array'                => 'O campo :attribute deve ser uma lista.',
    'before'               => 'O campo :attribute deve ser um data anterior à :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve ser entre :min e :max.',
        'file'    => 'O campo :attribute deve ser entre :min e :max kb.',
        'string'  => 'O campo :attribute deve ser entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve have entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'O campo :attribute confirmação não combina.',
    'date'                 => 'O campo :attribute é não um válida data.',
    'date_format'          => 'O campo :attribute não está no formato :format.',
    'different'            => 'O campo :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ter :digits dígitos.',
    'digits_between'       => 'O campo :attribute deve ter entre :min e :max dígitos.',
    'email'                => 'O campo :attribute deve ser um e-mail válido.',
    'filled'               => 'O campo :attribute é requerido.',
    'exists'               => 'O campo selected :attribute é inválido.',
    'image'                => 'O campo :attribute deve ser uma image.',
    'in'                   => 'O campo selected :attribute é inválido.',
    'integer'              => 'O campo :attribute deve ser um inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endereço de IP válido.',
    'max'                  => [
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file'    => 'O campo :attribute não pode ser maior que :max kb.',
        'string'  => 'O campo :attribute não pode ser maior que :max caracteres.',
        'array'   => 'O campo :attribute não pode ter mais que :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute deve ter no mínimo :min.',
        'file'    => 'O campo :attribute deve ter no mínimo :min kb.',
        'string'  => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'array'   => 'O campo :attribute deve ter no mínimo :min itens.',
    ],
    'not_in'               => 'O campo selecionado :attribute é inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'regex'                => 'O campo :attribute formato é inválido.',
    'required'             => 'O campo :attribute é requerido.',
    'required_if'          => 'O campo :attribute é requerido quando :other é :value.',
    'required_with'        => 'O campo :attribute é requerido quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é requerido quando :values está presente.',
    'required_without'     => 'O campo :attribute é requerido quando :values está não presente.',
    'required_without_all' => 'O campo :attribute é requerido quando nenhum dos :values estão presente.',
    'same'                 => 'O campo :attribute e :other devem combinar.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file'    => 'O campo :attribute deve ser :size kb.',
        'string'  => 'O campo :attribute deve ser :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'string'               => 'O campo :attribute deve ser um texto.',
    'timezone'             => 'O campo :attribute deve ser um Fuso Horário válido.',
    'unique'               => 'O campo :attribute já está sendo usado.',
    'url'                  => 'O campo :attribute formato é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you pode specify custom validation messages for attributes using O
    | convention "attribute.rule" to name O lines. This makes it quick to
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
    | O following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
