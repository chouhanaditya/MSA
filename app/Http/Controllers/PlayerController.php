<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Http\Requests;
use App\User;
use Session;
use Auth;

class PlayerController extends Controller
{
    public function index()
    {
           if (Auth::check())
        {
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $user_role=$user->role;
            $user_id=$user->id;

            if($user_role=="Coach") 
            {
                $login_coach_team = Team::where('user_id', $user_id)->first();
                $login_coach_team_id=$login_coach_team->id;
                $login_coach_team_name=$login_coach_team->team_name;

                $myTeamPlayers = Player::where('team_id', $login_coach_team_id)->orderBy('player_name','asc')->get();
            }
            else
            {
                $myTeamPlayers=null;
            }

        }
        else
        {
            $user_role = null;
            $myTeamPlayers = null;
            $login_coach_team_name=null;
        }

        $players=Player::orderBy('player_name','asc')->get();
        return view('player.index',compact('players','login_coach_team_name','myTeamPlayers'));
    }

    public function show($id)
    {
        $player = Player::findOrFail($id);
        return view('player.show',compact('player'));
    }


    public function create()
    {
        try {
            if (Auth::check()) {
                $email = Auth::user()->email;
                $user = User::where('email', $email)->first();
                $user_id = $user->id;

                $team = Team::where('user_id', $user_id)->lists('team_name', 'id');
                return view('player.create', compact('team'));

            }
            else
             return view('auth/login');   
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            if (strpos($e,'Integrity constraint violation') !== false) {
            $message='This email id is registered with MSA. Please try another one.';
            }
            else {
                $message='Somethong went wrong.Please try again.';
            }
            return view('player.error',compact('message'));
            }

}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'player_name' => 'required',
            'player_email' => 'required|email',
            'player_address' => 'required',
            'player_city' => 'required',
            'player_state' => 'required',
            'player_zipcode' => 'required|digits:5',
            'player_contactno' => 'required|numeric',
        ]);
        try {
            $player = new Player($request->all());
            $player->save();

            return redirect('player');
            }catch (\Illuminate\Database\QueryException $e)
            {
                if (strpos($e,'Integrity constraint violation') !== false) {
                    $message='This email id is registered with MSA. Please try another one.';
                   }
                else {
                    $message='Somethong went wrong.Please try again.';
                    }
                return view('player.error',compact('message'));
            }

    }

    public function edit($id)
    {
        if (Auth::check())
        {
            $email=Auth::user()->email;
            $coach_id = User::where('email', $email)->lists('id');
            $login_coach_team_name=Team::where('user_id',$coach_id )->lists('team_name');

            $player=Player::find($id);
            $player_team_name=$player->team->team_name;

            if (strpos($login_coach_team_name, $player_team_name) !== false) {
                $flag=true;
            }
            else
                $flag=false;

            return view('player.edit',compact('player','flag'));
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
        try {

             $this->validate($request, [
            'player_name' => 'required',
            'player_address' => 'required',
            'player_city' => 'required',
            'player_state' => 'required',
            'player_zipcode' => 'required|digits:5',
            'player_contactno' => 'required|numeric',
            'player_eligibility_status' => 'required',
             
        ]);
            
            $player = new Player($request->all());
            $player = Player::find($id);
            $player->update($request->all());
            return redirect('player');
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
            $email=Auth::user()->email;
            $coach_id = User::where('email', $email)->lists('id');
            $login_coach_team_name=Team::where('user_id',$coach_id )->lists('team_name');

            $player=Player::find($id);
            $player_team_name=$player->team->team_name;

            if (strpos($login_coach_team_name, $player_team_name) !== false) {
                Player::find($id)->delete();
                return redirect('player');
            }
            else
                $message='You are not authorized to delete player of the other team.';
                return view('player.error',compact('message'));


            } catch (\Illuminate\Database\QueryException $e)
            {
                $message='Somethong went wrong.Please try again.';
                return view('player.error',compact('message'));
            }
    }

}
