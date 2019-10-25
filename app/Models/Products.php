<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model{

    protected $table = 'products';

    protected $fillable = [
        'product',
        'description',
        'quantity',
        'color',
        'color_variant'
    ];

    public $timestamps = true;

}

?>
