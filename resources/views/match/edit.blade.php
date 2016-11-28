@extends('layouts.app')
@section('content')

{!! Form::model($match,['method' => 'PATCH','route'=>['match.update',$match->id]]) !!}
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

                <div class="panel-heading">Update Details</div>
                
                <div class="panel-body">


    <div class="col-md-6">
        <h4> Match Start Time:</h4>
        {!! Form::text('match_start_time',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
            <h4> Match End Time:</h4>
        {!! Form::text('match_end_time',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
    <h4> Team <?php echo ($match['match_team1_id']); ?> Score:</h4>
        {!! Form::text('match_team1_score',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
        <h4> Team <?php echo ($match['match_team2_id']); ?> Score:</h4>
        {!! Form::text('match_team2_score',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
        <h4> Team <?php echo ($match['match_team1_id']); ?> Goal Details:</h4>
         {!! Form::text('match_team1_goals',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
        <h4> Team <?php echo ($match['match_team2_id']); ?> Goal Details:</h4>
        {!! Form::text('match_team2_goals',null,['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
<br>        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {!! Form::close() !!}

@stop

