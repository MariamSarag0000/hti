<?php

use Illuminate\Database\Seeder;
use App\Material;


class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Material::class, 50)->create();
    }
}
