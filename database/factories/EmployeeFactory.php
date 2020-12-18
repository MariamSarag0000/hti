<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $departmentId = $faker->numberBetween(1, 3);
    return [
        'name_en'    	=> $faker->name,
    	'name_ar'    	=> '',
    	'email'      	=> $faker->unique()->safeEmail,
    	'password'      => bCrypt(123456),
    	'phone'      	=> $faker->e164PhoneNumber,
    	'employee_id' 	=> $faker->numberBetween(0, 10000), 	
    	'address'    	=> $faker->address,
    	'birthdate'  	=> $faker->date(),
        'salary'        => $faker->numberBetween(3000, 20000),
        'department_id' => $departmentId,

        
    ];
});
