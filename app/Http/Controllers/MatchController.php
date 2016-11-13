<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Match;
use App\Player;
use App\Http\Requests;
use App\User;
use App\Field;
use App\Tournament;
use Auth;
use App\Team;
use Carbon;

class MatchController extends Controller
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
        
        $Prev_matches=Match::whereDate('match_date','<',Carbon\Carbon::today()->format('Y-m-d'))->lists('id','match_team1_id','match_team2_id');

        $Today_matches= Match::whereDate('match_date','=',Carbon\Carbon::today()->format('Y-m-d'))->lists('id','match_team1_id','match_team2_id');

        // $Future_matches=Match::whereDate('match_date','>',Carbon\Carbon::today()->format('Y-m-d'))->lists('id','match_team1_id','match_team2_id');

      //   $Prev_matches=Match::all();
      //   $Today_matches= Match::all();
       $Future_matches=Match::all();

        return view('match.index',compact ('Prev_matches','Today_matches','Future_matches','role'));
    }

    public function show($id)
    {
        $match = Match::find($id);
        $user=User::where('id',$match->referee_id)->first();
        $referee_name=$user->name;

        if (Auth::check())
        {
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $username=$user->name;

            if($username==$referee_name)
                $flag='true';
            else
                $flag='false';
        }
        else
        {
                $flag='false';
        }

       return view('match.show',compact('match','referee_name','flag'));
    }

    public function create()
    {
        if (Auth::check())
        {
            $teams = Team::all();
            $tournaments=Tournament::lists('tournament_name','id');
			$users=null;
			$fields=null;
            return view('match.create', compact('teams','tournaments','users','fields'));
        }
    }

    public function store(Request $request)
    {
        try {
			
				$this->validate($request, [
                'tournament_id' => 'required',
                'match_date' => 'required',
                ]);
			
            
		if($request->match_team1_id==null)
            {
                $match_date=$request->match_date;
				$tournaments=Tournament::where('id',$request->tournament_id)->lists('tournament_name','id');
                $fields=Field::lists('field_name','id');
				
				// $users = User::where('role', 'Referee')->whereNotIn('id', function ($b) {
                //  $b->select('referee_id')->from('matches');
				// })->lists('name', 'id');

                $users = User::where('role', 'Referee')->whereNotIn('id', function ($b) {
                $b->select('referee_id')->from('matches')->where('match_date', '$match_date');
                })->lists('name', 'id');
				
				$teams = Team::whereNotIn('id', function ($b) {
                $b->select('match_team1_id')->from('matches')->where('match_date','$match_date');
                // and select('match_team2_id')->from('matches')->where('match_date','$match_date');
				})->lists('team_name', 'id');
						
            return view('match.create', compact('teams','tournaments','users','fields','match_date'));
			
            }
            else {					
                $match = new Match($request->all());
                $match->save();
                return redirect('match');
            }
			
        }catch (\Illuminate\Database\QueryException $e)
        {
            if (strpos($e, 'Integrity constraint violation') !== false) {
                $message = 'This match name is registered with MSA. Please try another one.';
            } else {
                $message = 'Somethong went wrong.Please try again.';
            }
            return view('match.error',compact('message'));
        }
    }

    public function edit($id)
    {
        $match=Match::find($id);
        return view('match.edit',compact('match'));
    }

    public function update($id,Request $request)
    {
        try
        {
            $match= new Match($request->all());
            $match=Match::find($id);
            $match->update($request->all());
            return redirect('match');

        } catch (\Illuminate\Database\QueryException $e) {

                $message = 'Somethong went wrong.Please try again.';
                return view('match.error', compact('message'));
        }
    }
    public function destroy($id)
    {
        try {

            $players=Player::where('match_id', $id)->lists('id');

            //Deleting all players of that match.
            foreach ($players as $player)
            {
                Player::find($player)->delete();
            }
            //Deleting that match.
            Match::find($id)->delete();
            return redirect('match');

        } catch (\Illuminate\Database\QueryException $e)
        {
            $message='Somethong went wrong.Please try again.';
            return view('match.error',compact('message'));
        }
    }
}
