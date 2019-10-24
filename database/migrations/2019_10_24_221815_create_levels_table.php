<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration{

    public function up(){

        Schema::create('levels', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('level', 13)->unique()->notNullable();
            $table->timestamps();
        });
    }

    public function down(){

        Schema::dropIfExists('levels');
    }
}
