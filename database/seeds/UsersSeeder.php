<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder{

    public function run(){

        factory(App\Models\Users::class, 5)->create();
    }
}
