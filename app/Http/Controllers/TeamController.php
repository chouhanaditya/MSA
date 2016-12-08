<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Team;
use App\Player;
use App\Http\Requests;
use App\User;
use Auth;
use App\Match;
use Datetime;
use Carbon\Carbon;

class TeamController extends Controller
{
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

        $teams=Team::all();
        return view('team.index',compact ('teams','role'));
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('team.show',compact('team'));
    }

    public function create()
    {
        if (Auth::check()) 
        {
            $schools = School::whereNotIn('id', function ($a) {
                $a->select('school_id')->from('teams');
            })->lists('school_name', 'id');

            $users = User::where('role', 'Coach')->whereNotIn('id', function ($b) {
                $b->select('user_id')->from('teams');
            })->lists('name', 'id');

            return view('team.create', compact('schools', 'users'));
        }
        else
         return view('auth/login');   
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
                'team_name' => 'required',
                'coach_mobile' => 'required|numeric',
                'school_id' => 'required',
                'user_id' => 'required',
            ]);

            $team = new Team($request->all());
            $team->save();

            return redirect('team');
        }catch (\Illuminate\Database\QueryException $e)
        {
            if (strpos($e,'Integrity constraint violation') !== false) {
                $message='This email id is registered with MSA. Please try another one.';
            }
            else {
                $message='Somethong went wrong.Please try again.';
            }
            return view('team.error',compact('message'));
        }
    }

    public function edit($id)
    {
        if (Auth::check())
        {
            $team=Team::find($id);
            return view('team.edit',compact('team'));
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
                'team_name' => 'required',
                'coach_mobile' => 'required|numeric',
            ]);

            $team= new Team($request->all());
            $team=Team::find($id);
            $team->update($request->all());

            return redirect('team');
        } 
        catch (\Illuminate\Database\QueryException $e) {
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

            $players=Player::where('team_id', $id)->lists('id');

            //Deleting all players of that team.
            foreach ($players as $player)
            {
                Player::find($player)->delete();
            }
            //Deleting that team.
            Team::find($id)->delete();
            return redirect('team');

        } catch (\Illuminate\Database\QueryException $e)
        {
            $message='Somethong went wrong.Please try again.';
            return view('team.error',compact('message'));
        }
    }
}
