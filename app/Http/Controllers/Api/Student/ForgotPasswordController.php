<?php

namespace App\Http\Controllers\Api\Student;

use App\ApiCode;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Password;

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

    // The new one:
    public function forgot(){
        $credentials=request()->validate(['email'=>'required|email']);
        Password::sendResetLink($credentials);
        return response()->json('Reset password link sent to your email');
    }

    public function reset(ResetPasswordRequest $request){
        $credentials=request()->validate();

        $email_password_status=Password::reset($request->validate(),$credentials, function ($user,$password){    //it is the new password 
            $user->password=$password;
            $user->save();
        });

        if($email_password_status==Password::INVALID_TOKEN){
            return $this->responsBadRequest(ApiCode::INVALID_RESET_PASSWORD_TOKEN);
        }

        return $this->respondWithMessage("Password has been successfully changed");
    }

}
