<?php

namespace App\Models;

class ProductsValidator{
        public const ERROR_MESSAGES = [
                'required'       => 'O campo :attribute é obrigatório',
                'numeric'        => 'O valor do campo deve ser numérico',
                'max'            => 'A :attribute deve ter no máximo :max caracteres',
                'min'            => 'A :attribute deve ter no mínimo :min caracteres',
                'array'          => 'A :attribute deve ser um array'
        ];

        public const NEW_PACKAGE_RULE = [
                'product'        => 'required | min:1 | max:100',
                'description'    => 'max:255',
                'quantity'       => 'required | min:1 | max:1000 | numeric',
                'color'          => 'required | min:1 | max:11 | numeric',
                'color_variant'  => 'max:500 | array'
        ];
}

?>
