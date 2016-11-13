@extends('layouts.app')

@section('content')
    <h3>Add New Field</h3>
    {!! Form::open(['url' => 'field']) !!}

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
        {!! Form::label('field_name', 'Field Name:*') !!}
        {!! Form::text('field_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_address', 'Field Address:*') !!}
        {!! Form::text('field_address',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_city', 'Field City:*') !!}
        {!! Form::text('field_city',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_state', 'Field State:*') !!}
        {!! Form::text('field_state',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_zipcode', 'Field Zip:*') !!}
        {!! Form::text('field_zipcode',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_owner_org', 'Field Owner Organization:') !!}
        {!! Form::text('field_owner_org',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_owner_name', 'Field Owner Name:*') !!}
        {!! Form::text('field_owner_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_owner_email', 'Field Owner Email:*') !!}
        {!! Form::text('field_owner_email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_owner_contactno', 'Field Owner Contact Number:*') !!}
        {!! Form::text('field_owner_contactno',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field_notes', 'Field Notes:') !!}
        {!! Form::text('field_notes',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop