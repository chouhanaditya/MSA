<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;

class ProfileController extends Controller
{
    function getChangeProfile()
    {
         try {

            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            
            return view('/ChangeProfile',compact('user'));
        }
        catch (Exception $e)
        {
            return view ('errors/503');

        }
    }

    protected function postChangeProfile(Request $request)
    {
         try {
         		$this->validate($request, [
                'name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zipcode' => 'required|digits:5' ,
                'contactno' => 'required|numeric',
                'security_question1' => 'required',
                'security_question2' => 'required',
                'security_answer1' => 'required',
                'security_answer2' => 'required',
                ]);


            $user= new User($request->all());
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $user->update($request->all());

            return view('ProfileChanged');
        }
        catch (\Exception $e)
        {
            return view ('errors/503');

        }
    }

}