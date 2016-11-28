@extends('layouts.app')
@section('content')
    
    {!! Form::model($tournament,['method' => 'PATCH','route'=>['tournament.update',$tournament->id]]) !!}

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
    
                <div class="panel-heading">Update Details</div>                
                <div class="panel-body">

    <div class="col-md-6">
        {!! Form::label('tournament_name', 'Tournament Name*:') !!}
        {!! Form::text('tournament_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('tournament_price_money', 'Tournament Price Money (in $)*:') !!}
        {!! Form::text('tournament_price_money',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
       <br> {!! Form::label('tournament_start_date', 'Tournament Start Date*:') !!}
        {!! Form::text('tournament_start_date',null,['class'=>'form-control']) !!}
    </div>
    
    <div class="col-md-6">
        <br>{!! Form::label('tournament_end_date', 'Tournament End Date*:') !!}
        {!! Form::text('tournament_end_date',null,['class'=>'form-control']) !!}
    </div>

     <div class="col-md-6">
    <br> {!! Form::label('tournament_teams', 'Tournament Teams*:') !!}
            @foreach ($teams as $team)
            <ul>
                <input type="checkbox" name="tournament_teams[]" value={{ $team->id }} > {{ $team->team_name }}
            </ul>
            @endforeach
    </div>

    <div class="col-md-6">
    <br>   {!! Form::label('tournament_sponsers', 'Tournament Sponsors*:') !!}
        {!! Form::text('tournament_sponsers',null,['class'=>'form-control']) !!}
    </div>
    
    </div>
    </div>

    <div class="col-md-6">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>
    </div>

    {!! Form::close() !!}
@stop

