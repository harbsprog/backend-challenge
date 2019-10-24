<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration{

    public function up(){

        Schema::create('colors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id')->autoIncrement();
            $table->string('color', 40)->unique()->notNullable();
            $table->string('code', 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(){

        Schema::dropIfExists('colors');
    }
}
