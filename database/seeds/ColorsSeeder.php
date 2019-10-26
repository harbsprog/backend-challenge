<?php

use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder{

    public function run(){

        factory(App\Models\Colors::class, 5)->create();
    }
}
