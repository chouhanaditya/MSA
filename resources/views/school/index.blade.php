@extends('layouts.app')

@section('content')
    <h3>Schools</h3>
    @if ((Auth::check())&&($role=='Official'))
        <a href="{{url('/school/create')}}" class="btn btn-success">Add New School</a>
    @endif
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>School Name</th>
            <th>School Address</th>
            <th>School City</th>
            <th>School State</th>
            <th colspan="3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($schools as $school)
            <tr>
                <td><a href="{{url('school',$school->id)}}">{{ $school->school_name }}</a></td>
                <td>{{ $school->school_address }}</td>
                <td>{{ $school->school_city }}</td>

                @if ((Auth::check())&&($role=='Official'))
                    <td>{{ $school->school_state }}</td>
                    <td><a href="{{route('school.edit',$school->id)}}" class="btn btn-warning">Update Details</a></td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['school.destroy', $school->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                @else
                    <td colspan="2">{{ $school->school_state }}</td>
                @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

