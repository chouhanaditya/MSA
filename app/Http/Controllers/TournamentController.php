<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Tournament;
use App\Player;
use App\Http\Requests;
use App\User;
use Auth;
use App\Team;

class TournamentController extends Controller
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

        $tournaments=Tournament::all();
        return view('tournament.index',compact ('tournaments','role'));
    }
    public function show($id)
    {
        $tournament = Tournament::find($id);
        $teamIds=$tournament->tournament_teams;
        $teamlist=explode(",",$teamIds);
        array_pop($teamlist);

        $tournament_team_names="";

        foreach($teamlist as $team_id ) {
            
            $tournament_team_names = Team::where('id',$team_id)->lists('team_name') . ",". $tournament_team_names;
        }
        $team_names=explode(",",$tournament_team_names);

        $team_names=str_replace(['"'], '', $team_names);
        $team_names=str_replace([']'], '', $team_names);  
        $team_names=str_replace(['['], '', $team_names);
        $team_names=str_replace(['"'], '', $team_names);  

        return view('tournament.show',compact('tournament','team_names'));
    }
    public function create()
    {
        if (Auth::check())
        {
            $teams = Team::all();
            return view('tournament.create', compact('teams'));
        }
        else
         return view('auth/login');   
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'tournament_name' => 'required',
                'tournament_price_money' => 'required|numeric',
                'tournament_teams'=>'required',
                'tournament_sponsers' => 'required',
                'tournament_start_date' => 'required|date|date_format:Y-m-d|after:today',
                'tournament_end_date' => 'required|date|date_format:Y-m-d|after:today',
            ]);

            $tournament_teams="";

            foreach($request->tournament_teams as $tournament_team ) {
                $tournament_teams = $tournament_team . "," . $tournament_teams;
            }

            $request['tournament_teams']=$tournament_teams;
            $tournament = new Tournament($request->all());
            $tournament->save();
            return redirect('tournament');

        }catch (\Illuminate\Database\QueryException $e)
        {
            if (strpos($e, 'Integrity constraint violation') !== false) {
                $message = 'This tournament name is registered with MSA. Please try another one.';
            } else {
                $message = 'Somethong went wrong.Please try again.';
            }
            return view('tournament.error',compact('message'));
        }
    }
    public function edit($id)
    {
        if (Auth::check())
        {
            $tournament=Tournament::find($id);
            $teams = Team::all();
            return view('tournament.edit',compact('tournament','teams'));
        }
        else
         return view('auth/login');   
    }
    public function update($id,Request $request)
    {
        try
        {
            $this->validate($request, [
                'tournament_name' => 'required',
                'tournament_price_money' => 'required|numeric',
                'tournament_teams'=>'required',
                'tournament_sponsers' => 'required',
                'tournament_start_date' => 'required|date|date_format:Y-m-d',
                'tournament_end_date' => 'required|date|date_format:Y-m-d',
            ]);

            $tournament_teams="";

            foreach($request->tournament_teams as $tournament_team ) {
                $tournament_teams = $tournament_team . "," . $tournament_teams;
            }

            $request['tournament_teams']=$tournament_teams;
 

            $tournament= new Tournament($request->all());
            $tournament=Tournament::find($id);
            $tournament->update($request->all());
            return redirect('tournament');

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

            $players=Player::where('tournament_id', $id)->lists('id');

            //Deleting all players of that tournament.
            foreach ($players as $player)
            {
                Player::find($player)->delete();
            }
            //Deleting that tournament.
            Tournament::find($id)->delete();
            return redirect('tournament');

        } catch (\Illuminate\Database\QueryException $e)
        {
            $message='Somethong went wrong.Please try again.';
            return view('tournament.error',compact('message'));
        }
    }
//    public function getStats($id)
//    {
//        $tournament = Tournament::findOrFail($id);
//        $teamIds=$tournament->tournament_teams;
//        $teamlist=explode(",",$teamIds);
//
//        $teamlist=compact($teamlist);
//        $tournament_team_names="";
//
//        foreach($teamlist as $team_id ) {
//            $tournament_team_names = Team::find($team_id)->lists('team_name') . ",". $tournament_team_names;
//        }
//
//        $team_names=explode(",",$tournament_team_names);
//
//        return view('tournament.stats',compact('teamlist'));
//    }
}
