<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Student;

class AuthController extends Controller
{
    public function login(Request $request)   //login
    {
        $request->validate([
            'student_id' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);
            
        $student = Student::where('student_id', $request->student_id)->first();
        
        if (!$student || !Hash::check($request->password, $student->password)) {
            throw ValidationException::withMessages([
                'student_id' => 'Invalid Credentials',
            ]);
        }

        $token = $student->createToken($request->device_name)->plainTextToken;
        return response()->json(['token' => $token]);
    }

    public function me()    //profile
    {
        return auth()->user(); 
    }
    
    public function logout(Request $request)   //logout
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['msg' => 'Logout success']);
    }

    public function print()
    {
        return response()->json(Student::get(['image','name_en','name_ar','student_id','units']));

    }
/*
    public function requestPage()
    {
        return response()->json(Student::get(['image','name_en','name_ar','student_id','email']));
        return response()->json(Student::get);
    }
*/
   


}
