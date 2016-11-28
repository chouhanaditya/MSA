@extends('layouts.app')
@section('content')
   
    {!! Form::model($team,['method' => 'PATCH','route'=>['team.update',$team->id]]) !!}
 
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
    
                <div class="panel-heading">Update Details</div>                
                <div class="panel-body">

        <!--   <div class="form-group">
                {!! Form::label('school_id', 'School Id:') !!}
                {!! Form::text('school_id',null, ['class'=>'form-control','readonly'=>'true']) !!}
          </div>

            <div class="form-group">
                {!! Form::label('user_id', 'Coach Name:') !!}
                {!! Form::text('user_id',null, ['class'=>'form-control','readonly'=>'true']) !!}
             </div>-->


    <div class="form-group">
        {!! Form::label('team_name', 'Team Name:*') !!}
        {!! Form::text('team_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('coach_mobile', 'Coach Mobile:*') !!}
        {!! Form::text('coach_mobile',null,['class'=>'form-control']) !!}
    </div>

        <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>

    </div>      </div>
            </div>
        </div>
    </div>
    
    {!! Form::close() !!}
@stop

