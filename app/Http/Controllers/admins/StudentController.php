<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    //checking if the user logged:
        public function __construct()
        {
            $this->middleware('auth');
        }
    
        //selecting:
        public function index(){
           $students=Student::all();
            return view('admins.student.index', ['students' => $students]);
        }
}
