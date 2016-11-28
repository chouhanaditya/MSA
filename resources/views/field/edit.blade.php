@extends('layouts.app')
@section('content')
    {!! Form::model($field,['method' => 'PATCH','route'=>['field.update',$field->id]]) !!}

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
    

                <div class="panel-heading">Edit Details</div>
                
                <div class="panel-body">

                        <div class="col-md-6">
                            <br>{!! Form::label('field_name', 'Field Name:*') !!}
                            {!! Form::text('field_name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_address', 'Field Address:*') !!}
                            {!! Form::text('field_address',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_city', 'Field City:*') !!}
                            {!! Form::text('field_city',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_state', 'Field State:*') !!}
                            {!! Form::text('field_state',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_zipcode', 'Field Zip:*') !!}
                            {!! Form::text('field_zipcode',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_owner_org', 'Field Owner Organization:') !!}
                            {!! Form::text('field_owner_org',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_owner_name', 'Field Owner Name:*') !!}
                            {!! Form::text('field_owner_name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_owner_email', 'Field Owner Email:*') !!}
                            {!! Form::text('field_owner_email',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_owner_contactno', 'Field Owner Contact Number:*') !!}
                            {!! Form::text('field_owner_contactno',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('field_notes', 'Field Notes:') !!}
                            {!! Form::text('field_notes',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-6">
                            <br>{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
                {!! Form::close() !!}
@stop
