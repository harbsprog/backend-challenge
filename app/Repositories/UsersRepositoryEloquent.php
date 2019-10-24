<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersRepositoryEloquent implements UsersRepositoryInterface{
    private $user;

    public function __construct(Users $user){
        $this->user = $user;
    }

    public function getAll(){
        return $this->user
        ->select(
            'id',
            'email',
            'password',
            'level'
        )->get();
    }

    public function get(int $id){
        return $this->user
        ->select(
            'id',
            'email',
            'password',
            'level'
        )
        ->where('id',$id)
        ->get();
    }

    public function store(Request $request){
        $request->merge([
            'password' => Hash::make($request->password)
        ]);

        return $this->user->create($request->all());
    }

    public function update(int $id, Request $request){
        $request->merge([
            'password' => Hash::make($request->password)
        ]);

        return $this->user
        ->where('id', $id)
        ->update($request->all());
    }

    public function destroy(int $id){
        $user = $this->user->find($id);
        return $user->delete();
    }

}

?>
