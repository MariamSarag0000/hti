<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[
	    		'name_en'  => 'Computer Science',
	    		'name_ar'  => 'علوم حاسب',
	    		'code'     => '12',
	    		'building' => 'M'
    		], [
	    		'name_en'  => 'Management',
	    		'name_ar'  => 'أدارة',
	    		'code'     => '15',
	    		'building' => 'E'
    		], [
	    		'name_en'  => 'Engineering',
	    		'name_ar'  => 'هندسة',
	    		'code'     => '45',
	    		'building' => 'S'
    		],
    	];

    	foreach($data as $dep){	
	        Department::create([
	        	'name_en' => $dep['name_en'],
	        	'name_ar' => $dep['name_ar'],
	        	'code' => $dep['code'],
	        	'building' => $dep['building'],
	        ]);
    	}
    }
}
