<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbilitySuperheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability_superheroes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('superhero_id');
            $table->unsignedBigInteger('ability_id');

            $table->foreign('ability_id')->references('id')->on('abilities')->onDelete('cascade');
            $table->foreign('superhero_id')->references('id')->on('superheroes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ability_superheroes');
    }
}
