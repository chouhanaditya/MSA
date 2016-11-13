@extends('layouts.app')

@section('content')
    <h3>Fields</h3>
    @if ((Auth::check())&&($role=='Official'))
        <a href="{{url('/field/create')}}" class="btn btn-success">Add New field</a>
    @endif
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Field Name</th>
            <th>Field City</th>
            <th>Field Owner Name</th>
            <th>Field Owner Email </th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($fields as $field)
            <tr>
                <td><a href="{{url('field',$field->id)}}" >{{ $field->field_name }}</a></td>
                <td>{{ $field->field_city }}</td>
                <td>{{ $field->field_owner_name }}</td>
                <td>{{ $field->field_owner_email }}</td>

                @if ((Auth::check())&&($role=='Official'))
                    <td><a href="{{route('field.edit',$field->id)}}" class="btn btn-warning">Update Details</a></td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['field.destroy', $field->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

