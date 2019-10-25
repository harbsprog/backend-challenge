<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\ProductsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductsRepositoryEloquent implements ProductsRepositoryInterface{
    private $product;

    public function __construct(Products $product){
        $this->product = $product;
    }

    public function getAll(){

        return $this->product
        ->select(
            'products.id',
            'products.product',
            'products.description',
            'products.quantity',
            'colors.color',
            'colors.code',
            'products.color_variant'
        )->join('colors', 'colors.id', '=', 'products.color'
        )->get();
    }

    public function get(int $id){
        return $this->product
        ->select(
            'products.id',
            'products.product',
            'products.description',
            'products.quantity',
            'colors.color',
            'colors.code',
            'products.color_variant'
        )->join('colors', 'colors.id', '=', 'products.color'
        )->where('products.id',$id
        )->get();
    }

    public function getColorVariant(int $id){
        return $this->product
        ->select(
            'id',
            'color',
            'code'
        )->from('colors'
        )->where('id',$id
        )->get();
    }

    public function getAllColorVariant(){
        return $this->product
        ->select(
            'id',
            'color',
            'code'
        )->from('colors'
        )->get();
    }

    public function store(Request $request){
        return $this->product->create($request->all());
    }

    public function update(int $id, Request $request){
        return $this->product
        ->where('id', $id)
        ->update($request->all());
    }

    public function destroy(int $id){
        $product = $this->product->find($id);
        return $product->delete();
    }

}

?>
