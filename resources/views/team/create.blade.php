@extends('layouts.app')
@section('content')
    <h3>Add New Team</h3>
    {!! Form::open(['url' => 'team']) !!}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

       <div class="form-group">
           {!! Form::label('school_id', 'School Name:') !!}
           {!! Form::select('school_id', $schools) !!}
       </div>

    <div class="form-group">
        {!! Form::label('user_id', 'Coach Name:') !!}
        {!! Form::select('user_id', $users) !!}
    </div>

    <div class="form-group">
        {!! Form::label('team_name', 'Team Name:') !!}
        {!! Form::text('team_name',null,['class'=>'form-inline']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('coach_mobile', 'Coach Mobile Number:') !!}
        {!! Form::text('coach_mobile',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
