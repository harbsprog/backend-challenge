<?php

namespace App\Models;

class UsersValidator{
        public const ERROR_MESSAGES = [
                'required'       => 'O campo :attribute é obrigatório',
                'numeric'        => 'O valor do campo deve ser numérico',
                'max'            => 'O :attribute deve ter no máximo :max caracteres',
                'min'            => 'O :attribute deve ter no mínimo :min caracteres',
                'email'          => 'O campo :attribute deve conter um e-mail válido'
        ];

        public const NEW_PACKAGE_RULE = [
                'email'          => 'required | max:100 | email',
                'password'       => 'max:20 | min:8',
                'level'          => 'max:13 | numeric'
        ];
}

?>
