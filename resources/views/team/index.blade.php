@extends('layouts.app')

@section('content')
    <div>   
      <h3 style="text-align: center">Teams</h3> 
    </div> 

    @if ((Auth::check())&&($role=='Official'))
    <div class="pull-right">
        <a href="{{url('/team/create')}}" class="btn btn-success">Add New</a>
    
    </div>
    @endif
    <br>
    <br>
    <br>

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

                @if ((Auth::check())&&($role=='Official'))
                <td>{{ $team->matches_lost }}</td>
                <td><a href="{{route('team.edit',$team->id)}}" class="btn btn-warning">Update Details</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['team.destroy', $team->id]]) !!}
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this team? This will also delete all this team players.')">
                    {!! Form::close() !!}
                </td>
                @else
                    <td colspan="2">{{ $team->matches_lost }}</td>
                @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

