<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;
use App\Field;
use Auth;
use App\Team;
use App\Player;
use App\Http\Requests;
use App\Match;
use Datetime;
use Carbon\Carbon;

class FieldController extends Controller
{
    public function __construct()
    {
//       $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::check())
        {
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $role=$user->role;
        }
        else
            $role="";

        $fields=Field::all();
        $fields=compact('fields','role');
        return view('field.index',$fields);

    }
    public function show($id)
    {
        $field = Field::findOrFail($id);

        $Tournament_matches=Match::where([['match_date','<',Carbon::today()->format('Y-m-d')],['field_id',$id]])->orderBy('match_date','desc')->get();

        return view('field.show',compact('field','Tournament_matches'));
    }

    public function create()
    {
        if (Auth::check()) 
        {
            return view('field.create');
        }
        else
         return view('auth/login');   
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'field_name' => 'required',
                'field_address' => 'required',
                'field_city' => 'required|alpha',
                'field_state' => 'required',
                'field_zipcode' => 'required|digits:5',
                'field_owner_name' => 'required',
                'field_owner_email' => 'required|email',
                'field_owner_contactno' => 'required|numeric',
            ]);

            $field = new Field($request->all());
            $field->save();

            return redirect('field');
        }catch (\Illuminate\Database\QueryException $e)
        {
            if (strpos($e,'Integrity constraint violation') !== false) {
                $message='This email id is registered with MSA. Please try another one.';
            }
            else {
                $message='Somethong went wrong.Please try again.';
            }
            return view('field.error',compact('message'));
        }
    }

    public function edit($id)
    {
        if (Auth::check())
        {
            $field=Field::find($id);
            return view('field.edit',compact('field'));
        }
        else
         return view('auth/login');   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        try
        {
            $this->validate($request, [
                'field_name' => 'required',
                'field_address' => 'required',
                'field_city' => 'required|alpha',
                'field_state' => 'required',
                'field_zipcode' => 'required|digits:5',
                'field_owner_name' => 'required',
                'field_owner_email' => 'required|email',
                'field_owner_contactno' => 'required|numeric',
            ]);

            $field= new Field($request->all());
            $field=Field::find($id);
            $field->update($request->all());
            return redirect('field');

        } catch (\Illuminate\Database\QueryException $e) {
            if (strpos($e, 'Integrity constraint violation') !== false) {
                $message = 'This email id is registered with MSA. Please try another one.';
            } else {
                $message = 'Somethong went wrong.Please try again.';
            }
            return view('field.error', compact('message'));
        }
    }

    public function destroy($id)
    {
        try {

           $matches=Match::where('field_id', $id)->lists('id');

           //Deleting all matches associated with this field.
           foreach ($matches as $match)
           {
               Match::find($match)->delete();
           }

           //Deleting that field
           Field::find($id)->delete();

        return redirect('field');

        }
         catch (\Illuminate\Database\QueryException $e)
        {
            $message='Somethong went wrong.Please try again.';
            return view('field.error',compact('message'));
        }
    }
}
