@extends('layouts.app')
@section('content')
    <h3>Update Team Details</h3>
    {!! Form::model($team,['method' => 'PATCH','route'=>['team.update',$team->id]]) !!}

    <div class="form-group">
        {!! Form::label('team_name', 'Team Name:') !!}
        {!! Form::text('team_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('coach_mobile', 'Coach Mobile:') !!}
        {!! Form::text('coach_mobile',null,['class'=>'form-control']) !!}
    </div>

        <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop

