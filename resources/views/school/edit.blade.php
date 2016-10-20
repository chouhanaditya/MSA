@extends('layouts.app')
@section('content')
    <h3>Update School Details</h3>
    {!! Form::model($school,['method' => 'PATCH','route'=>['school.update',$school->id]]) !!}
    <div class="form-group">
        {!! Form::label('school_name', 'School Name:') !!}
        {!! Form::text('school_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('school_email', 'School Email') !!}
        {!! Form::text('school_email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('school_address', 'School Address:') !!}
        {!! Form::text('school_address',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('school_city', 'School City:') !!}
        {!! Form::text('school_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('school_state', 'School State:') !!}
        {!! Form::text('school_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('school_zipcode', 'School Zip:') !!}
        {!! Form::text('school_zipcode',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('school_contactno', 'School Contact Number:') !!}
        {!! Form::text('school_contactno',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
