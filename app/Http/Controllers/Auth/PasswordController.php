<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    protected function getSecurityQuestions(Request $request)
    {
        try {
            $email = $request->email;
            $user = User::where('email', $email)->first();
            return view('auth/passwords/SecurityQuestions', compact('user'));
        }
        catch (\Exception $e)
        {
            return view ('errors/503');

        }

    }
    protected function resetpassword(Request $request)
    {
        try {
            $email = $request->email;
            $security_answer1 = $request->security_answer1;
            $security_answer2 = $request->security_answer2;

            $user = User::where('email', $email)->first();
            $security_answer1_fetched = $user->security_answer1;
            $security_answer2_fetched = $user->security_answer2;

            if (($security_answer1 == $security_answer1_fetched) && ($security_answer2 == $security_answer2_fetched))
                return view('auth/passwords/ResetPassword', compact('user'));
            else
                return view('errors/WrongSecurityAnswers');
        }
        catch (\Exception $e)
        {
            return view ('errors/503');

        }

    }

    protected function changepassword(Request $request)
    {
        try {
            $email = $request->email;
            $password = Hash::make($request->password);
            $user = User::where('email', $email)->first();
            $user->password = $password;
            $user->save();

            return view('auth/passwords/PasswordSet');
        }
        catch (\Exception $e)
        {
            return view ('errors/503');

        }

    }
    protected function checkLogin(Request $request)
    {
        try {
            $email = $request->email;
            $password = Hash::make($request->password);
            $user = User::where('email', $email)->firstOrFail();

             if(($user-> password)==$password) {
                if(($user-> status=="pending"))
                {
                    return view('auth/passwords/ApprovalPending',$user->role);
                }
                else
                    return view('/welcome');
                }
            else
            {
                return view ('auth/passwords/WrongPassword');
            }
        }
        catch (\Exception $e)
        {
            return view ('errors/503');

        }
    }

}
