<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuffsMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs_materials', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('group');
            $table->integer('room');
            $table->integer('starting_period');
            $table->integer('ending_period');
            $table->time('starting_time');
            $table->time('ending_time');
            $table->unsignedBigInteger('stuff_id');
            $table->unsignedBigInteger('material_code');

            $table->foreign('material_code')->references('id')->on('materials');
            $table->foreign('stuff_id')->references('id')->on('stuffs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stuffs_materials');
    }
}
