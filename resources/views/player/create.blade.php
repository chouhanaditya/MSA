@extends('layouts.app')
@section('content')

    {!! Form::open(['url' => 'player']) !!}
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
    
                <div class="panel-heading">Add New Player</div>                
                <div class="panel-body">

    @if  (count($team)==0)
        <div class="alert alert-danger">
            <h3>You do not have any team in MSA. Please contact any MSA official for creating your team, thereafter you can
                add players in your team.</h3>
        </div>
    @else

    <div  align="center">
        {!! Form::label('team_id', 'Team Name:') !!}
        {!! Form::select('team_id', $team) !!}
    </div>

    <div class="col-md-6">
      <br>  {!! Form::label('player_name', 'Player Name:*') !!}
        {!! Form::text('player_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
    <br>    {!! Form::label('player_email', 'Player Email Id:*') !!}
        {!! Form::text('player_email',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('player_address', 'Player Address:*') !!}
        {!! Form::text('player_address',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('player_city', 'Player City:*') !!}
        {!! Form::text('player_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('player_state', 'Player State:*') !!}
        {!! Form::text('player_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('player_zipcode', 'Player Zipcode:*') !!}
        {!! Form::text('player_zipcode',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('player_contactno', 'Player Contact No:*') !!}
        {!! Form::text('player_contactno',null,['class'=>'form-control']) !!}
    </div>


    </div>
          </div>

    <div class="col-md-6">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>

    @endif

            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop
