@extends('layouts.app')

@section('content')
    
        <div>   
      <h3 style="text-align: center">Tournaments</h3> 
    </div> 

    @if ((Auth::check())&&($role=='Official'))
    <div class="pull-right">
        <a href="{{url('/tournament/create')}}" class="btn btn-success">Add New</a>
    </div>
    @endif

    <br>
    <br>
<br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Tournament Name</th>
            <th>Tournament Start Date</th>
            <th>Tournament End Date</th>
            <th> Tournament Sponsers</th>
            @if ((Auth::check())&&($role=='Official'))
                <th ></th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($tournaments as $tournament)
            <tr>
                <td><a href="{{url('tournament',$tournament->id)}}">{{ $tournament->tournament_name }}</a></td>
                <td>{{ $tournament->tournament_start_date }}</td>
                <td>{{ $tournament->tournament_end_date }}</td>
                <td> {{ $tournament->tournament_sponsers }}</td>


                @if ((Auth::check())&&($role=='Official'))
                    <td style="text-align: right"><a href="{{route('tournament.edit',$tournament->id)}}" class="btn btn-warning">Update Details</a></td>
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

