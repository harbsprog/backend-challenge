<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use App\Services\ColorsService;
use Illuminate\Http\Request;

class ColorsController extends Controller{

    private $colorsService;

    public function __construct(ColorsService $colorsService){
        $this->colorsService = $colorsService;
    }

    public function getAll(){
        return $this->colorsService->getAll();
    }

    public function get($id){
        return $this->colorsService->get($id);
    }

    public function store(Request $request){
        return $this->colorsService->store($request);
    }

    public function update($id, Request $request){
        return $this->colorsService->update($id, $request);
    }

    public function destroy($id){
        return $this->colorsService->destroy($id);
    }
}
