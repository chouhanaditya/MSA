@extends('layouts.app')
@section('content')
    {!! Form::open(['url' => 'team']) !!}
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
    
                <div class="panel-heading">Add New Team</div>                
                <div class="panel-body">

       <div class="col-md-6">
          <br> {!! Form::label('school_id', 'School Name:*') !!}
           {!! Form::select('school_id', $schools) !!}
       </div>

    <div class="col-md-6">
        <br>{!! Form::label('user_id', 'Coach Name:*') !!}
        {!! Form::select('user_id', $users) !!}
    </div>

    <div class="col-md-6">
        <br>{!! Form::label('team_name', 'Team Name:*') !!}
        {!! Form::text('team_name',null,['class'=>'form-inline']) !!}
    </div>

    <div class="col-md-6">
        <br>{!! Form::label('coach_mobile', 'Coach Mobile Number:*') !!}
        {!! Form::text('coach_mobile',null,['class'=>'form-inline']) !!}
    </div>


    <div class="col-md-6">
        <br>{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>      </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
