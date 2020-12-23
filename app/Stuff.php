<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $table='stuffs';
    
    protected $fillable = [
            'name_en',
            'name_ar',
            'email',
            'password',
            'stuff_id',
            'address',
            'phone',
            'birthdate',
            'salary',
            'status',
    ];

    
}
