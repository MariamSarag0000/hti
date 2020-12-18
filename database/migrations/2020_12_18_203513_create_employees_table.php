<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('employee_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name_en')->unique();
            $table->string('name_ar');
            $table->string('address');
            $table->string('phone')->unique();
            $table->date('birthdate');
            $table->decimal('salary');
            $table->unsignedBigInteger('department_id');

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
