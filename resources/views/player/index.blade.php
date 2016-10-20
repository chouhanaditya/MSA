@extends('layouts.app')

@section('content')
    <h3>Players</h3>
    @if ((Auth::check())&&($role=="Coach"))
        <a href="{{url('/player/create')}}" class="btn btn-success">Add Player</a>
    @endif
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Team Name</th>
            <th>Player Name</th>
            <th>Player Email</th>
            <th>Player Contact Number</th>
            <th colspan="3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td>{{ $player->team->team_name }}</td>
                <td>{{ $player->player_name }}</td>
                <td>{{ $player->player_email }}</td>
                <td>{{ $player->player_contactno }}</td>
                <td><a href="{{url('player',$player->id)}}" class="btn btn-primary">View Details</a></td>
                @if ((Auth::check())&&($role=="Coach"))
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

