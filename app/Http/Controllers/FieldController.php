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
        return view('field.show',compact('field'));
    }

    public function create()
    {
        if (Auth::check()) {
            return view('field.create');
        }

    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'field_name' => 'required',
                'field_address' => 'required',
                'field_city' => 'required',
                'field_state' => 'required',
                'field_zipcode' => 'required',
                'field_owner_name' => 'required',
                'field_owner_email' => 'required',
                'field_owner_contactno' => 'required',
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
        $field=Field::find($id);
        return view('field.edit',compact('field'));
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

//            $team_id=Team::where('field_id', $id)->lists('id');
//            $players=Player::where('team_id', $team_id)->lists('id');
//
//            //Deleting all players of that team associated with this field.
//            foreach ($players as $player)
//            {
//                Player::find($player)->delete();
//            }
//            //Deleting team associated with this field.
//            Team::find($team_id)->delete();
//
//            //Deleting that field
//            field::find($id)->delete();

            return redirect('field');

        } catch (\Illuminate\Database\QueryException $e)
        {
            $message='Somethong went wrong.Please try again.';
            return view('field.error',compact('message'));
        }
    }
}
