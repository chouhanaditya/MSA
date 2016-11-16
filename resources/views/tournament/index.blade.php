@extends('layouts.app')

@section('content')
    <h3>Tournaments</h3>
    @if ((Auth::check())&&($role=='Official'))
        <a href="{{url('/tournament/create')}}" class="btn btn-success">Add New Tournament</a>
    @endif
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Tournament Name</th>
            <th>Tournament Start Date</th>
            <th>Tournament End Date</th>
            @if ((Auth::check())&&($role=='Official'))
                <th colspan="2"></th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($tournaments as $tournament)
            <tr>
                <td><a href="{{url('tournament',$tournament->id)}}">{{ $tournament->tournament_name }}</a></td>
                <td>{{ $tournament->tournament_start_date }}</td>
                <td>{{ $tournament->tournament_end_date }}</td>
                {{--<td><a href="{{url('tournament/team',$tournament->id)}}" class="btn btn-warning">View Statistics</a></td>--}}


                @if ((Auth::check())&&($role=='Official'))
                    <td><a href="{{route('tournament.edit',$tournament->id)}}" class="btn btn-warning">Update Details</a></td>
               <!--  <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['tournament.destroy', $tournament->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
                -->  @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

