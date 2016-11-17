@extends('layouts.app')
@section('content')
    
    <h3>Update <?php echo ($match['match_name']); ?> Details</h3>
    <br>

    {!! Form::model($match,['method' => 'PATCH','route'=>['match.update',$match->id]]) !!}

    <div class="form-group">
        <h4> Match Start Time:</h4>
        {!! Form::text('match_start_time',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
            <h4> Match End Time:</h4>
        {!! Form::text('match_end_time',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    <h4> Team <?php echo ($match['match_team1_id']); ?> Score:</h4>
        {!! Form::text('match_team1_score',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <h4> Team <?php echo ($match['match_team2_id']); ?> Score:</h4>
        {!! Form::text('match_team2_score',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <h4> Team <?php echo ($match['match_team1_id']); ?> Goal Details:</h4>
         {!! Form::text('match_team1_goals',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <h4> Team <?php echo ($match['match_team2_id']); ?> Goal Details:</h4>
        {!! Form::text('match_team2_goals',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    
    {!! Form::close() !!}

@stop

