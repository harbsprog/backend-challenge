<?php

namespace App\Repositories;

use App\Models\Colors;
use App\Repositories\ColorsRepositoryInterface;
use Illuminate\Http\Request;

class ColorsRepositoryEloquent implements ColorsRepositoryInterface{
    private $color;

    public function __construct(Colors $color){
        $this->color = $color;
    }

    public function getAll(){
        return $this->color
        ->select(
            'id',
            'color',
            'code'
        )->get();
    }

    public function get(int $id){
        return $this->color
        ->select(
            'id',
            'color',
            'code'
        )
        ->where('id',$id)
        ->get();
    }

    public function store(Request $request){
        return $this->color->create($request->all());
    }

    public function update(int $id, Request $request){
        return $this->color
        ->where('id', $id)
        ->update($request->all());
    }

    public function destroy(int $id){
        $color = $this->color->find($id);
        return $color->delete();
    }

}

?>
