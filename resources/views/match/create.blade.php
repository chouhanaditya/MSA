@extends('layouts.app')
@section('content')
    <h3>Schedule Match</h3>
    {!! Form::open(['url' => 'match']) !!}

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (count($fields) <= 0)
	
    <div class="panel panel-default">
        <div class="panel-heading">
		
		<div class="form-group">
            {!! Form::label('tournament_id', 'Select Tournament*:') !!}
            {!! Form::select('tournament_id', $tournaments) !!}
        </div>


        <div class="form-group">
            {!! Form::label('match_date', 'Enter Match Date*:') !!}
            {!! Form::text('match_date',null) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Go', ['class' => 'btn btn-primary success']) !!}
        </div>
        {!! Form::close() !!}
        </div>
    </div>

	@else

    <div class="panel panel-default">
        <div class="panel-heading">

		<div class="form-group">
            {!! Form::label('tournament_id', 'Tournament Name:') !!}	
            {!! Form::select('tournament_id', $tournaments) !!}		

        </div>

		<div class="form-group">
            {!! Form::label('match_date', 'Match Date:') !!}
			<input id="match_date" type="match_date" class="form-control" name="match_date" value="<?php echo ($match_date); ?>" readonly="true">
        </div>

			<div class="form-group">
				{!! Form::label('match_name', 'Enter Match Name:') !!}
				{!! Form::text('match_name',null,['class'=>'form-control']) !!}
			</div>
	
			<div class="form-group">
				{!! Form::label('match_start_time', 'Enter Match Time:') !!}
				{!! Form::text('match_start_time',null,['class'=>'form-control']) !!}
			</div>
			
            <div class="form-group">
                {!! Form::label('referee_id', 'Select Match Referee:') !!}
                {!! Form::select('referee_id', $users) !!}
            </div>

            <div class="form-group">
                {!! Form::label('field_id', 'Select Field:') !!}
                {!! Form::select('field_id', $fields) !!}
			</div>
			
			<div class="form-group">
                {!! Form::label('match_team1_id', 'Select team 1:') !!}
                {!! Form::select('match_team1_id', $teams) !!}
			</div>
			
			<div class="form-group">
                {!! Form::label('match_team2_id', 'Select team 2:') !!}
                {!! Form::select('match_team2_id', $teams) !!}
			</div>
			
			 <div class="form-group">
                {!! Form::submit('Schedule', ['class' => 'btn btn-primary success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endif

@stop