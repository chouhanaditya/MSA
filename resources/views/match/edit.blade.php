@extends('layouts.app')
@section('content')
    
    <h3>Update Match Details</h3>

    {!! Form::model($match,['method' => 'PATCH','route'=>['match.update',$match->id]]) !!}

    <div class="form-group">
        {!! Form::label('match_start_time', 'Match Start Time:') !!}
        {!! Form::text('match_start_time',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('match_half_time', 'Match Half Time:') !!}
        {!! Form::text('match_half_time',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('match_end_time', 'Match End Time:') !!}
        {!! Form::text('match_end_time',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('match_team1_score', 'Team 1 Score:') !!}
        {!! Form::text('match_team1_score',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('match_team2_score', 'Team 2 Score:') !!}
        {!! Form::text('match_team2_score',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('match_team1_goals', 'Team 1 Goals Details:') !!}
        {!! Form::text('match_team1_goals',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('match_team2_goals', 'Team 2 Goals Details:') !!}
        {!! Form::text('match_team2_goals',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    
    {!! Form::close() !!}

@stop

