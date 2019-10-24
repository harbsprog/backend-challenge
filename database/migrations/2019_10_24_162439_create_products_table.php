<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration{

    public function up(){

        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id')->autoIncrement();
            $table->string('product', 100)->notNullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->notNullable();
            $table->integer('color')->notNullable();
            $table->string('color_variant')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('color')
                ->references('id')->on('colors');
        });

    }

    public function down(){

        Schema::dropIfExists('products');
    }
}
