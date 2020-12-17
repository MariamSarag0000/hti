<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use App\Student;
use App\Mail\SendMailreset;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function sendEmail(Request $request){
        if(!$this->validateEmail($request->email)){
            return $this->failedResponse();
        }
        $this->send($request->email);
        return $this->successResponse();
    }

    public function send($email){
        $token=$this->createToken($email);  //token is important to send code
        Mail::to($email)->send(new SendMailReset($token,$email));
    }

    public function createToken($email)  // this is a function to get your request email that there are or not to send mail
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();

        if ($oldToken) {
            return $oldToken->token;
        }

        $token = Str::random(40);
        $this->saveToken($token, $email);
        return $token;
    }


    public function saveToken($token, $email)  // this function save new password
    {
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    public function validateEmail($email)  //this is a function to get your email from database
    {
        return !!Student::where('email', $email)->first();
    }

    public function failedResponse()
    {
        return response()->json([
            'error' => 'Email does\'t found on our database'
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse()
    {
        return response()->json([
            'data' => 'Reset Email is send successfully, please check your inbox.'
        ], Response::HTTP_OK);
    }
}
