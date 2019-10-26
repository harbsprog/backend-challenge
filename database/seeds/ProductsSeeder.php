<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder{

    public function run(){

        factory(App\Models\Products::class, 5)->create();
    }
}
