@extends('layouts.app')
@section('content')

	
	<div class="container">	
	<h3><?php echo ($school['school_name']); ?> Details </h3>

        <table class="table table-striped table-bordered table-hover">
			<tbody>
            <tr class="bg-info">
            <tr>
                <td>School Email</td>
                <td><?php echo ($school['school_email']); ?></td>
            </tr>
            <tr>
                <td>School Address</td>
                <td><?php echo ($school['school_address']); ?></td>
            </tr>
            <tr>
                <td>School City </td>
                <td><?php echo ($school['school_city']); ?></td>
            </tr>
            <tr>
                <td>School State</td>
                <td><?php echo ($school['school_state']); ?></td>
            </tr>
            <tr>
                <td>School Zipcode </td>
                <td><?php echo ($school['school_zipcode']); ?></td>
            </tr>
            <tr>
                <td>School Contact Number</td>
                <td><?php echo ($school['school_contactno']); ?></td>
            </tr>

            </tbody>
            
			</tbody>
        </table>
    </div>

	@stop


