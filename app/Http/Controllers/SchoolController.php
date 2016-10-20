<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\User;
use Auth;
use App\Team;
use App\Player;
use App\Http\Requests;

class SchoolController extends Controller
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

        $schools=School::all();
        $schools=compact('schools','role');
        return view('school.index',$schools);

    }
    public function show($id)
    {
        $school = School::findOrFail($id);
        return view('school.show',compact('school'));
    }


    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'school_name' => 'required',
                'school_email' => 'required',
                'school_address' => 'required',
                'school_city' => 'required',
                'school_state' => 'required',
                'school_zipcode' => 'required',
                'school_contactno' => 'required',
            ]);

            $school = new School($request->all());
            $school->save();

            return redirect('school');
        }catch (\Illuminate\Database\QueryException $e)
        {
            if (strpos($e,'Integrity constraint violation') !== false) {
                $message='This email id is registered with MSA. Please try another one.';
            }
            else {
                $message='Somethong went wrong.Please try again.';
            }
            return view('school.error',compact('message'));
        }
    }

    public function edit($id)
    {
        $school=School::find($id);
        return view('school.edit',compact('school'));
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
        $school= new School($request->all());
        $school=School::find($id);
        $school->update($request->all());
        return redirect('school');
    } catch (\Illuminate\Database\QueryException $e) {
            if (strpos($e, 'Integrity constraint violation') !== false) {
                $message = 'This email id is registered with MSA. Please try another one.';
            } else {
                $message = 'Somethong went wrong.Please try again.';
            }
            return view('school.error', compact('message'));
        }
    }

    public function destroy($id)
    {
        try {

            $team_id=Team::where('school_id', $id)->lists('id');
            $players=Player::where('team_id', $team_id)->lists('id');

            //Deleting all players of that team associated with this school.
            foreach ($players as $player)
            {
                Player::find($player)->delete();
            }
            //Deleting team associated with this school.
            Team::find($team_id)->delete();

            //Deleting that school
            School::find($id)->delete();

            return redirect('school');

        } catch (\Illuminate\Database\QueryException $e)
        {
            $message='Somethong went wrong.Please try again.';
            return view('school.error',compact('message'));
        }


    }

    public function stringify($id)
    {

        $school = School::where('id', $id)->select('school_name','school_email','school_address','school_city','school_state','school_zipcode','school_contactno')->first();

        $school = $school->toArray();
        return response()->json($school);
    }

}
