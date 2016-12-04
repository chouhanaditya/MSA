@extends('layouts.app')

@section('content')

    <div>   
      <h3 style="text-align: center">Fields</h3> 
    </div> 
    
    @if ((Auth::check())&&($role=='Official'))
    <div class="pull-right">
        <a href="{{url('/field/create')}}" class="btn btn-success">Add New</a>
    </div>
    @endif
<br>
    <br>
    <br>
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

                @if ((Auth::check())&&($role=='Official'))
                    <td>{{ $field->field_owner_email }}</td>
                    <td style="text-align: right"><a href="{{route('field.edit',$field->id)}}" class="btn btn-warning">Update Details</a></td>
                    <td style="text-align: right">
                         {!! Form::open(['method' => 'DELETE', 'route'=>['field.destroy', $field->id]]) !!}
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this field. This will also delete all the scheduled matches on this field.')">
                        {!! Form::close() !!}
                        <input type="hidden" name="field_id" value="<?php echo $field->id; ?>">
                     </td>
                @else
                    <td colspan="2">{{ $field->field_owner_email }}</td>
                @endif
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

