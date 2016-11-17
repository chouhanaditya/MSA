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
use Datetime;
use Carbon\Carbon;

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
        

        $Prev_matches=Match::where('match_date','<',Carbon::today()->format('Y-m-d'))->get();

        $Today_matches= Match::where('match_date','=',Carbon::today()->format('Y-m-d'))->get();

        $Future_matches=Match::where('match_date','>',Carbon::today()->format('Y-m-d'))->get();

        return view('match.index',compact ('Prev_matches','Today_matches','Future_matches','role'));
    }

    public function show($id)
    {
        $match = Match::find($id);

        $user=User::where('id',$match->referee_id)->first();
        $referee_name=$user->name;

        $field=Field::where('id',$match->field_id)->first();
        $field_name=$field->field_name;

        $tournament=Tournament::where('id',$match->tournament_id)->first();
        $tournament_name=$tournament->tournament_name;


        $playersIds= $match->match_half_time;
        $match_team1_id=$match->match_team1_id;
        $match_team2_id=$match->match_team2_id;

        $players_names_team1="";
        $players_names_team2="";
        $players_flag_team1='false';
        $players_flag_team2='false';

        if($playersIds!='')
            {

                $playersIdArray=explode(",",$playersIds);
                array_pop($playersIdArray);
                
                $playersIdArray=array_unique($playersIdArray);

                foreach($playersIdArray as $player_id )
                 {           
                    $players_names_team1 = Player::where([['id',$player_id],['team_id',$match_team1_id]]) 
                    ->lists('player_name') . ",". $players_names_team1;


                     $players_names_team2 = Player::where([['id',$player_id],['team_id',$match_team2_id]]) 
                    ->lists('player_name') . ",". $players_names_team2;
                 }

                    $players_names_team1_new=$players_names_team1;
                    $players_names_team2_new=$players_names_team2;


                $players_names_team1=explode(",",$players_names_team1);
                $players_names_team2=explode(",",$players_names_team2);

               
                $players_names_team1=str_replace(['['], '', $players_names_team1);
                $players_names_team1=str_replace(['"'], '', $players_names_team1);  
                $players_names_team1=str_replace(['"'], '', $players_names_team1);
                $players_names_team1=str_replace([']'], '', $players_names_team1);  

                $players_names_team2=str_replace(['"'], '', $players_names_team2);
                $players_names_team2=str_replace([']'], '', $players_names_team2);  
                $players_names_team2=str_replace(['['], '', $players_names_team2);
                $players_names_team2=str_replace(['"'], '', $players_names_team2);  

                $players_names_team1=array_unique($players_names_team1);

                $players_names_team2=array_unique($players_names_team2);
                

                if($players_names_team1 !=null)
                {
                    $players_flag_team1='true';
                }  

                if($players_names_team2 !=null) 
                {
                    $players_flag_team2='true';
                }

                  
            }

        if (Auth::check())
        {
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $username=$user->name;

            if($username==$referee_name)
                $Update_flag='true';
            else
                $Update_flag='false';            
        }

        else
        {
                $Update_flag='false';
        }

       return view('match.show',compact('match','referee_name','tournament_name','field_name','Update_flag','players_names_team1','players_flag_team1','players_names_team2','players_flag_team2'));
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
        //try {
			
				$this->validate($request, [
                'tournament_id' => 'required',
                'match_date' => 'required',
                ]);
			
            
		if($request->match_team1_id==null)
            {
                $match_date=strtotime($request->match_date);
                $match_date=date('Y-m-d',$match_date);
                                
				$tournaments=Tournament::where('id',$request->tournament_id)->lists('tournament_name','id');
               
                $fields=Field::lists('field_name','id');
               
                // $users = User::where('role', 'Referee')->whereNotIn('id', function ($b) {
                // $b->select('referee_id')->from('matches')->where('match_date', $match_date);
                // })->lists('name', 'id');

                // $teams = Team::whereNotIn('id', function ($b) {
                // $b->select('match_team1_id')->from('matches')->where('match_date',$match_date);
                //     ->select('match_team2_id')->from('matches')->where('match_date',$request->match_date)->get();
                // // and select('match_team2_id')->from('matches')->where('match_date','$match_date');
                // })->lists('team_name', 'id');
                
                $users = User::where('role', 'Referee')->lists('name', 'id');
				
				$teams = Team::lists('team_name', 'id');
						
            return view('match.create', compact('teams','tournaments','users','fields','match_date'));
			
            }
            else {		
                $request['match_half_time']="";	
                $request['match_end_time']="";                 
                $request['match_team1_goals']="";             
                $request['match_team2_goals']=""; 

                $match = new Match($request->all());
                $match->save();
                return redirect('match');
            }
			
        // }catch (\Illuminate\Database\QueryException $e)
        // {
        //     $message = 'Somethong went wrong.Please try again.';
        //     return view('match.error',compact('message'));
        // }
    }

    public function edit($id)
    {
        if (Auth::check())
        {
            $match=Match::find($id);
            return view('match.edit',compact('match'));
        }
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

    public function getTeamSelection()
    {
         if (Auth::check())
        {
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $userid=$user->id;

            $user_team=Team::where('user_id',$userid)->first();
            $user_teamname=$user_team->team_name;
            $user_teamId=$user_team->id;

            $user_matches=Match::where('match_team1_id',$user_teamId)->orWhere('match_team2_id',$user_teamId)->get();

            $myplayers=Player::where([['team_id',$user_teamId],['player_eligibility_status','In']])->get();

        }

        else
        {
            $user_teamname="";
            $user_matches="";
            $myplayers="";
       }
        
        return view('match.teamSelection',compact ('user_matches','user_teamname','myplayers'));
    }

    public function postTeamSelection(Request $request)
    {
        try {

            $this->validate($request, [
                'match_id' => 'required',
                'match_players' => 'required',
            ]);

            $match_id=$request->match_id;
            $match_players= Match::where('id',$match_id)->lists('match_half_time');
            $match_players=str_replace(['["'], '', $match_players);
            $match_players=str_replace(['"]'], '', $match_players);

            foreach($request->match_players as $player ) {
                $match_players = $player . "," . $match_players;
            }
 
        Match::where('id',$match_id)->update(['match_half_time'=>$match_players]);

        return redirect('match');

        }catch (\Illuminate\Database\QueryException $e)
        
        {
            $message = 'Somethong went wrong.Please try again.';
            return view('match.error',compact('message'));
        }
    }
}