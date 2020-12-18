<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Material;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    $departmentId = $faker->numberBetween(1, 3);
    return [
        'material_code'=>$faker->unique()->numerify('A###'),
        'material_name_en'=>$faker->name,
        'material_name_ar'=>'',
        'units'=>$faker->numberBetween(1, 4),
        'num_of_groups'=>$faker->numberBetween(0, 60),
        'department_id' => $departmentId         
    ];
});
