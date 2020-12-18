<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('stuff_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
          //  $table->string('academic_degree',255);
            $table->string('name_en',255)->unique();
            $table->string('name_ar',255);
            $table->string('address',255);
            $table->string('phone')->unique();
            $table->date('birthdate');
            $table->decimal('salary');
            $table->enum('status', ['professor', 'assistant']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stuffs');
    }
}
