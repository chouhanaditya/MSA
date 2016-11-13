@extends('layouts.app')

@section('content')
    <h3>Players</h3>
    <a class="btn btn-primary">All Players</a>
    &nbsp; &nbsp;
    @if ((Auth::check())&&($user_role=="Coach"))
        <a href="{{url('/player/create')}}" class="btn btn-success">Add Player</a>
        &nbsp; &nbsp;
        <a class="btn btn-warning">My Players</a>
    @endif
    <hr>

    @if(!$myPlayers==null)
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Player Name</th>
            <th>Team Name</th>
            <th>Player Email</th>
            <th>Player Contact Number</th>
            <th colspan="3"></th>
        </tr>
        <tr>
            {{--<h3><?php echo ($myPlayers['player_name']); ?>  </h3>--}}
        </tr>
        </thead>
        <tbody>
        @foreach ($myPlayers as $myplayer)
            <tr>
                <td><a href="{{url('player',$myplayer->id)}}">{{ $myplayer->player_name }}</a></td>
                <td>{{ $myplayer->team->team_name }}</td>
                <td>{{ $myplayer->player_email }}</td>
                <td>{{ $myplayer->player_contactno }}</td>
                <td><a href="{{route('player.edit',$myplayer->id)}}" class="btn btn-warning">Update Details</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['player.destroy', $myplayer->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach

        </tbody>

    </table>
    @endif

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Player Name</th>
            <th>Team Name</th>
            <th>Player Email</th>
            <th>Player Contact Number</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td><a href="{{url('player',$player->id)}}" >{{ $player->player_name }}</a></td>
                <td>{{ $player->team->team_name }}</td>
                <td>{{ $player->player_email }}</td>
                <td>{{ $player->player_contactno }}</td>
                @if ((Auth::check())&&($user_role=="Coach"))
                    <td><a href="{{route('player.edit',$player->id)}}" class="btn btn-warning">Update Details</a></td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['player.destroy', $player->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

