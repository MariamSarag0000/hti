<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name_en');
            $table->string('name_ar');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('student_id')->unique();
            $table->string('password');
            $table->double('gpa', 3, 2);
            $table->smallInteger('units');
            $table->mediumText('address');
            $table->string('image')->nullable();
            $table->date('birthdate');
            $table->enum('status', ['student', 'alumni'])->default('student');
            $table->unsignedBigInteger('department_id');


            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
