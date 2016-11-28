@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'school']) !!}


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
    

                <div class="panel-heading">Add New School</div>                
                <div class="panel-body">

    <div class="col-md-6">
        {!! Form::label('school_name', 'School Name:*') !!}
        {!! Form::text('school_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('school_email', 'School Email:*') !!}
        {!! Form::text('school_email',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
      <br>  {!! Form::label('school_address', 'School Address:*') !!}
        {!! Form::text('school_address',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('school_city', 'School City:*') !!}
        {!! Form::text('school_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('school_state', 'School State:*') !!}
        {!! Form::text('school_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('school_zipcode', 'School Zip:*') !!}
        {!! Form::text('school_zipcode',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        <br>{!! Form::label('school_contactno', 'School Contact Number:*') !!}
        {!! Form::text('school_contactno',null,['class'=>'form-control']) !!}
    </div>

                    </div>

    <div class="col-md-6">
        <br>{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
                </div>
            </div>
        </div>
    </div>
    
    {!! Form::close() !!}
@stop

