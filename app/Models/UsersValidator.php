<?php

namespace App\Models;

class UsersValidator{
        public const ERROR_MESSAGES = [
                'required'       => 'O campo :attribute é obrigatório',
                'numeric'        => 'O valor do campo deve ser numérico',
                'max'            => 'O :attribute deve ter no máximo :max caracteres',
                'min'            => 'O :attribute deve ter no mínimo :min caracteres'
        ];

        public const NEW_PACKAGE_RULE = [
                'email'          => 'required | max:100',
                'password'       => 'max:20 | min:8',
                'level'          => 'max:13 | numeric'
        ];
}

?>
