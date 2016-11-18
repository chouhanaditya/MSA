@extends('layouts.app')

@section('content')
   
     @if (count($myTeamPlayers)>0)
 
    <h3>{{ $login_coach_team_name }} Players</h3>

    <a href="{{url('/player/create')}}" class="btn btn-success">Add Player</a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover">

        <thead>
        <tr class="bg-info">
            <th>Player Name</th>
            <th>Player Email</th>
            <th>Player Contact Number</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($myTeamPlayers as $player)
            <tr>
                <td><a href="{{url('player',$player->id)}}" >{{ $player->player_name }}</a></td>
                <td>{{ $player->player_email }}</td>
                <td>{{ $player->player_contactno }}</td>
                <td><a href="{{route('player.edit',$player->id)}}" class="btn btn-warning">Update Details</a></td>
                <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['player.destroy', $player->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
 @endif
   
<h3 style="text-align: center;  margin-top: 20px;">All Players</h3>
<br>

        <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Player Name</th>
            <th>Team Name</th>
            <th>Player Email</th>
            <th>Player Contact Number</th>            
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td><a href="{{url('player',$player->id)}}" >{{ $player->player_name }}</a></td>
                <td>{{ $player->team->team_name }}</td>
                <td>{{ $player->player_email }}</td>
                <td>{{ $player->player_contactno }}</td>
             </tr>
        @endforeach

        </tbody>

    </table>

@endsection

