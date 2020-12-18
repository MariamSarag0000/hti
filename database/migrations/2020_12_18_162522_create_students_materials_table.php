<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_materials', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
          
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('material_code');

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('material_code')->references('id')->on('materials')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_materials');
    }
}
