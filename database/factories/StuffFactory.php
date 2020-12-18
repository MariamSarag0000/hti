<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stuff;
use Faker\Generator as Faker;

$factory->define(Stuff::class, function (Faker $faker) {
    return [
        'name_en'    	=> $faker->name,
    	'name_ar'    	=> '',
    	'email'      	=> $faker->unique()->safeEmail,
    	'password'      => bCrypt(123456),
    	'phone'      	=> $faker->e164PhoneNumber,
    	'stuff_id' 	    => $faker->numberBetween(0, 999),  	
    	'address'    	=> $faker->address,
        'birthdate'  	=> $faker->date(),
        'status'        => $faker->randomElement(['professor', 'assistant']),
        'salary'        => $faker->numberBetween(3000, 20000),
    ];
});
