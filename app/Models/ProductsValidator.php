<?php

namespace App\Models;

class ProductsValidator{
        public const ERROR_MESSAGES = [
                'required'       => 'O campo :attribute é obrigatório',
                'numeric'        => 'O valor do campo deve ser numérico',
                'max'            => 'A :attribute deve ter no máximo :max caracteres',
                'min'            => 'A :attribute deve ter no mínimo :min caracteres'
        ];

        public const NEW_PACKAGE_RULE = [
                'product'        => 'max:100 | min:1 | required',
                'description'    => 'max:255',
                'quantity'       => 'max:1000 | min:1 | numeric | required',
                'color'          => 'max:11 | min:1 | numeric | required',
                'color_variant'  => 'max:500 | min:1'
        ];
}

?>
