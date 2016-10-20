@extends('layouts.app')
@section('content')

    {!! Form::open(['url' => 'player']) !!}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if  (count($team)==0)
        <div class="alert alert-danger">
            <h3>You do not have any team in MSA. Please contact any MSA official for creating your team, thereafter you can
                add players in your team.</h3>
        </div>
    @else
        <h3>Add New Player</h3>
    <div class="form-group">
        {!! Form::label('team_id', 'Team Name:') !!}
        {!! Form::select('team_id', $team) !!}
    </div>
        <div class="form-group">
        {!! Form::label('player_name', 'Player Name:') !!}
        {!! Form::text('player_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('player_email', 'Player Email Id:') !!}
        {!! Form::text('player_email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('player_address', 'Player Address:') !!}
        {!! Form::text('player_address',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('player_city', 'Player City:') !!}
        {!! Form::text('player_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('player_state', 'Player State:') !!}
        {!! Form::text('player_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('player_zipcode', 'Player Zipcode:') !!}
        {!! Form::text('player_zipcode',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('player_contactno', 'Player Contact No:') !!}
        {!! Form::text('player_contactno',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
    @endif
@stop
