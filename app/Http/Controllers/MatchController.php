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
        

        $Prev_matches=Match::where('match_date','<',Carbon::today()->format('Y-m-d'))->orderBy('match_date','desc')->get();

        $Today_matches= Match::where('match_date','=',Carbon::today()->format('Y-m-d'))->orderBy('match_date','desc')->get();

        $Future_matches=Match::where('match_date','>',Carbon::today()->format('Y-m-d'))->orderBy('match_date','desc')->get();

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
            $role=$user->role;

            if($username==$referee_name)
                $Update_flag='true';
            else
                $Update_flag='false';            
        }

        else
        {
                $Update_flag='false';
        }

       return view('match.show',compact('match','referee_name','tournament_name','field_name','Update_flag','role','players_names_team1','players_flag_team1','players_names_team2','players_flag_team2'));
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
        else
         return view('auth/login');   
    }

    public function store(Request $request)
    {
        try {

				$this->validate($request, [
                'tournament_id' => 'required',
                'match_date' => 'required|date|date_format:Y-m-d|after:today',
                ]);
			
            
		if($request->match_team1_id==null)
            {
                $match_date=$request->match_date;
                                
				$tournaments=Tournament::where('id',$request->tournament_id)->lists('tournament_name','id');

                $busyFields=Match::where('match_date',$request->match_date)->lists('field_id');                              
                $fields=Field::whereNotIn('id',$busyFields)->lists('field_name','id');

                $busyReferees=Match::where('match_date',$request->match_date)->lists('referee_id');               
                $users = User::where('role','Referee')->whereNotIn('id', $busyReferees)->lists('name', 'id');

                $busyteams1=Match::where('match_date',$request->match_date)->lists('match_team1_id');
                $busyteams2=Match::where('match_date',$request->match_date)->lists('match_team2_id');

                $busyteams=$busyteams1->merge($busyteams2);				
				$teams = Team::whereNotIn('id', $busyteams)->lists('team_name', 'id');
						
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
			
        }catch (\Illuminate\Database\QueryException $e)
        {
            $message = 'Somethong went wrong.Please try again.';
            return view('match.error',compact('message'));
        }
    }

    public function edit($id)
    {
        if (Auth::check())
        {
            $match=Match::find($id);
            return view('match.edit',compact('match'));
        }

        else
         return view('auth/login');   
    }

    public function update($id,Request $request)
    {
        try
        {
                $this->validate($request, [
                'match_start_time' => 'required',
                'match_end_time' => 'required',
                'match_team1_score' => 'required|numeric',
                'match_team2_score' => 'required|numeric',
                'match_team1_goals' => 'required',
                'match_team2_goals' => 'required',
                ]);
        

            $match= new Match($request->all());
            $match=Match::find($id);
            $match->update($request->all());
            
            $match_team1_id=$match->match_team1_id;
            $match_team2_id=$match->match_team2_id;

            $team1=Team::where('id',$match_team1_id)->first();
            $team2=Team::where('id',$match_team2_id)->first();
            
            //Updating team stats

            $team1_win_count=$team1->matches_won;
            $team1_lost_count=$team1->matches_lost;

            $team2_win_count=$team2->matches_won;
            $team2_lost_count=$team2->matches_lost;

            $match_team1_score=$request->match_team1_score;
            $match_team2_score=$request->match_team2_score;

            if($match_team1_score>$match_team2_score)
            {
               $team1_win_count=$team1_win_count+1;
               $team2_lost_count=$team2_lost_count+1;
            }

            if($match_team1_score<$match_team2_score)
            {                
               $team2_win_count=$team2_win_count+1;
               $team1_lost_count=$team1_lost_count+1;
            }

            Team::where('id',$match_team1_id)->update(['matches_won'=>$team1_win_count]);
            Team::where('id',$match_team1_id)->update(['matches_lost'=>$team1_lost_count]);
            
            Team::where('id',$match_team2_id)->update(['matches_won'=>$team2_win_count]);
            Team::where('id',$match_team2_id)->update(['matches_lost'=>$team2_lost_count]);

            return redirect('match');


        } catch (\Illuminate\Database\QueryException $e) {

                $message = 'Somethong went wrong.Please try again.';
                return view('match.error', compact('message'));
        }
    }
    public function destroy($id)
    {
        try {

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

            $user_matches=Match::where([['match_date','>',Carbon::today()->format('Y-m-d')],['match_team1_id',$user_teamId]])->orWhere(
                [['match_date','>',Carbon::today()->format('Y-m-d')],['match_team2_id',$user_teamId]])->orderBy('match_date','desc')->get();

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