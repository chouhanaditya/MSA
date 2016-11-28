@extends('layouts.app')
@section('content')
    {!! Form::open(['url' => 'match']) !!}
    <br>
    <br>
    
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

             @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="panel-heading">Schedule Match</div>
                
                <div class="panel-body">

                @if (count($fields) <= 0)

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

            	@else

                    <div class="col-md-6">
                        {!! Form::label('tournament_id', 'Tournament Name:') !!}	
                        {!! Form::select('tournament_id', $tournaments) !!}		

                    </div>

            		<div class="col-md-6">
                        {!! Form::label('match_date', 'Match Date:') !!}
            			<input id="match_date" type="match_date" class="form-inline" name="match_date" value="<?php echo ($match_date); ?>" readonly="true">
                    </div>

            			<div class="col-md-6">
            				<br>{!! Form::label('match_name', 'Enter Match Name:*') !!}
            				{!! Form::text('match_name',null,['class'=>'form-control']) !!}
            			</div>
            	
            			<div class="col-md-6">
            				<br>{!! Form::label('match_start_time', 'Enter Match Start Time:*') !!}
            				{!! Form::text('match_start_time',null,['class'=>'form-control']) !!}
            			</div>
            			
                        <div class="col-md-6">
                            <br>{!! Form::label('referee_id', 'Select Match Referee:*') !!}
                            {!! Form::select('referee_id', $users, array('class'=>'form-control'))!!}
                        </div>

                        <div class="col-md-6">
                            <br>{!! Form::label('field_id', 'Select Field:*') !!}
                            {!! Form::select('field_id', $fields) !!}
            			</div>
            			
            			<div class="col-md-6">
                            <br>{!! Form::label('match_team1_id', 'Select team 1:*') !!}
                             {!! Form::select('match_team1_id', $teams) !!}
            			</div>
            			
            			<div class="col-md-6">
                            <br>{!! Form::label('match_team2_id', 'Select team 2:*') !!}
                            {!! Form::select('match_team2_id', $teams) !!}
            			</div>
            			
            			 <div class="col-md-6">
                            <br>{!! Form::submit('Schedule', ['class' => 'btn btn-primary success']) !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop