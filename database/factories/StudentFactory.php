<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
	$departmentId = $faker->numberBetween(1, 3);
    return [
    	'name_en'    	=> $faker->name,
    	'name_ar'    	=> '',
    	'email'      	=> $faker->unique()->safeEmail,
    	'password'      => bCrypt(123456),
    	'phone'      	=> $faker->e164PhoneNumber,
    	'student_id' 	=> $departmentId . $faker->year() . $faker->numberBetween(0, 999),
    	'gpa'        	=> $faker->randomFloat(2, 1, 4),
    	'units'      	=> $faker->numberBetween(0, 160),
    	'address'    	=> $faker->address,
    	'birthdate'  	=> $faker->date(),
    	'status'        => $faker->randomElement(['student', 'alumni']),
		'department_id' => $departmentId  
		
		
    ];
});
