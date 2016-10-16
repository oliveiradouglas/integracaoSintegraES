<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules ter multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é uma url válida.',
    'after'                => 'O campo :attribute deve ser uma data após :date.',
    'alpha'                => 'O campo :attribute só pode conter letras.',
    'alpha_dash'           => 'O campo :attribute só pode conter letras, números, e traços.',
    'alpha_num'            => 'O campo :attribute só pode conter letras e números.',
    'array'                => 'O campo :attribute deve ser um vetor.',
    'serfore'               => 'O campo :attribute deve ser uma data antes de :date.',
    'sertween'              => [
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'file'    => 'O campo :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve estar entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'O campo de confirmação não corresponde.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'O campo :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ter :digits digitos.',
    'digits_sertween'       => 'O campo :attribute deve estar entre :min e :max digitos.',
    'dimensions'           => 'O campo :attribute tem dimensões de imagem inválidos.',
    'distinct'             => 'O campo :attribute tem um valor duplicado.',
    'email'                => 'O campo :attribute deve ser um email válido.',
    'exists'               => 'O valor selecionado em :attribute é inválido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute  é obrigatório.',
    'image'                => 'O campo :attribute deve ser uma imagem.',
    'in'                   => 'O campo valor selecionado em :attribute é inválido.',
    'in_array'             => 'O campo :attribute não exéte no :other.',
    'integer'              => 'O campo :attribute deve ser um número inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endereço de IP válido.',
    'json'                 => 'O campo :attribute deve estar no formato JSON.',
    'max'                  => [
        'numeric' => 'O campo :attribute não pode ter um valor maior que :max.',
        'file'    => 'O campo :attribute não pode ter um valor maior que :max kilobytes.',
        'string'  => 'O campo :attribute não pode ter um valor maior que :max caracteres.',
        'array'   => 'O campo :attribute não pode ter maé que :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um aquivo do tipo: :values.',
    'mimetypes'            => 'O campo :attribute deve ser um aquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute deve ter no minimo :min.',
        'file'    => 'O campo :attribute deve ter no minimo :min kilobytes.',
        'string'  => 'O campo :attribute deve ter no minimo :min caracteres.',
        'array'   => 'O campo :attribute deve ter no minimo :min itens.',
    ],
    'not_in'               => 'O valor selecionado em selecionado :attribute é inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve exétir.',
    'regex'                => 'O campo :attribute tem um formato inválido.',
    'required'             => 'O campo :attribute  é obrigatório.',
    'required_if'          => 'O campo :attribute  é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute  é obrigatório a menos que :other seja :values.',
    'required_with'        => 'O campo :attribute  é obrigatório quando :values existe.',
    'required_with_all'    => 'O campo :attribute  é obrigatório quando :values existe.',
    'required_without'     => 'O campo :attribute  é obrigatório quando os valores :values não existem.',
    'required_without_all' => 'O campo :attribute  é obrigatório quando nenhum dos valores :values existem.',
    'same'                 => 'O campo :attribute e :other devem combinar.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ter :size.',
        'file'    => 'O campo :attribute deve ter :size kilobytes.',
        'string'  => 'O campo :attribute deve ter :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve ser um fuso horário válido.',
    'unique'               => 'O valor do campo :attribute ja existe.',
    'uploaded'             => 'O campo :attribute falhou ao fazer upload.',
    'url'                  => 'O campo :attribute tem um formato de url inválido!.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. Thé makes it quick to
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
    | O campo following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". Thé simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
