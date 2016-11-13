@extends('layouts.app')
@section('content')
    <h3>Add New Tournament</h3>
    {!! Form::open(['url' => 'tournament']) !!}
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
        {!! Form::label('tournament_name', 'Tournament Name:') !!}
        {!! Form::text('tournament_name',null,['class'=>'form-control']) !!}
    </div>

       <div class="form-group">
           {!! Form::label('tournament_price_money', 'Tournament Price Money:') !!}
           {!! Form::text('tournament_price_money',null,['class'=>'form-control']) !!}
       </div>

    <div class="form-group">
        {!! Form::label('tournament_sponsers', 'Tournament Sponsers:') !!}
        {!! Form::text('tournament_sponsers',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tournament_start_date', 'Tournament Start Date:') !!}
        {!! Form::text('tournament_start_date',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tournament_end_date', 'Tournament End Date:') !!}
        {!! Form::text('tournament_end_date',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('tournament_teams', 'Tournament Teams:') !!}
    @foreach ($teams as $team)
            <ul>
                <input type="checkbox" name="tournament_teams[]" value={{ $team->id }} > {{ $team->team_name }}
            </ul>
        @endforeach
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
