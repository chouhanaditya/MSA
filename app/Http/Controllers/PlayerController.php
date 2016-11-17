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
         }
        else       
            $user_role = null;

        $players=Player::all();
        
        return view('player.index',compact('players','user_role'));

        //   if (Auth::check())
        // {
        //     $email=Auth::user()->email;
        //     $user = User::where('email', $email)->first();
        //     $user_role=$user->role;
        //     $user_id=$user->id;

        //     if($user_role=="Coach") {
        //         $login_coach_team_id = Team::where('user_id', $user_id)->lists('id');
        //         $myPlayers = Player::where('team_id', $login_coach_team_id);
        //     }
        //     else
        //         $myPlayers=null;

        // }
        // else
        // {
        //     $user_role = null;
        //     $myPlayers = null;
        // }

        // $players=Player::all();
        // return view('player.index',compact('players','user_role','myPlayers'));
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
            'player_email' => 'required',
            'player_contactno' => 'required',
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
