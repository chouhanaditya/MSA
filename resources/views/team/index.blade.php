@extends('layouts.app')

@section('content')
    <h3>Teams</h3>
    @if ((Auth::check())&&($role=='Official'))
    <a href="{{url('/team/create')}}" class="btn btn-success">Add New Team</a>
    @endif
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">

            <th>Team Name</th>
            <th>School Name</th>
            <th>Coach Name</th>
            <th>Coach Mobile</th>
            <th>Matches Won</th>
            <th>Matches Lost</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($teams as $team)
            <tr>

                <td><a href="{{url('team',$team->id)}}">{{ $team->team_name }}</a></td>
                <td>{{ $team->school->school_name }}</td>
                <td>{{ $team->user->name }}</td>
                <td>{{ $team->coach_mobile }}</td>
                <td>{{ $team->matches_won }}</td>
                <td>{{ $team->matches_lost }}</td>

                @if ((Auth::check())&&($role=='Official'))
                <td><a href="{{route('team.edit',$team->id)}}" class="btn btn-warning">Update Details</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['team.destroy', $team->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
                 @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

