@extends('layouts.app')
@section('content')
    <h3>Update Tournament Details</h3>


    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    {!! Form::model($tournament,['method' => 'PATCH','route'=>['tournament.update',$tournament->id]]) !!}

    <div class="form-group">
        {!! Form::label('tournament_name', 'Tournament Name:') !!}
        {!! Form::text('tournament_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tournament_price_money', 'Tournament Price Money:') !!}
        {!! Form::text('tournament_price_money',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tournament_sponsers', 'Tournament Sponsors:') !!}
        {!! Form::text('tournament_sponsers',null,['class'=>'form-control']) !!}
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
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop

