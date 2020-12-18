<?php

use Illuminate\Database\Seeder;
use App\Stuff;

class StuffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Stuff::class, 50)->create();
        
    }
}
