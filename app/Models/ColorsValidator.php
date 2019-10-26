<?php

namespace App\Models;

class ColorsValidator{
        public const ERROR_MESSAGES = [
                'required'       => 'O campo :attribute é obrigatório',
                'min'            => 'O :attribute deve ter no mínimo :min caracteres',
                'max'            => 'O :attribute deve ter no máximo :max caracteres',
                'regex'          => 'O campo :attribute deve ser uma cor hexadecimal'
        ];

        public const NEW_PACKAGE_RULE = [
                'color'          => 'required | max:40',
                'code'           => [
                    'max:7',
                    'min: 7',
                    'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'
                ]
        ];
}

?>
