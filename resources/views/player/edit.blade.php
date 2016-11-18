@extends('layouts.app')
@section('content')
    @if ($flag)
    <h3>Update Player Details</h3>
    {!! Form::model($player,['method' => 'PATCH','route'=>['player.update',$player->id]]) !!}
    <div class="form-group">
        {!! Form::label('player_name', 'Player Name:') !!}
        {!! Form::text('player_name',null,['class'=>'form-control']) !!}
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
        {!! Form::label('player_contactno', 'Player Contact Number:') !!}
        {!! Form::text('player_contactno',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('player_eligibility_status', 'Player Eligibility Status:') !!}
        <br>
        <input type="radio"  name="player_eligibility_status" value="In">  In
        <br>
        <input type="radio"  name="player_eligibility_status" value="Out">  Out
    </div>

    

        <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

        @else
    <div class="alert alert-danger">
        <h3>You are not authorized to update player information of players of the other team.</h3>
    </div>

    @endif
@stop

