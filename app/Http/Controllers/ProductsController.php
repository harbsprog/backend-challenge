<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use App\Services\ProductsService;
use Illuminate\Http\Request;

class ProductsController extends Controller{

    private $productsService;

    public function __construct(ProductsService $productsService){
        $this->productsService = $productsService;
    }

    public function getAll(){
        return $this->productsService->getAll();
    }

    public function get($id){
        return $this->productsService->get($id);
    }

    public function store(Request $request){
        return $this->productsService->store($request);
    }

    public function update($id, Request $request){
        return $this->productsService->update($id, $request);
    }

    public function destroy($id){
        return $this->productsService->destroy($id);
    }
}
