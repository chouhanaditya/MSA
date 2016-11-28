@extends('layouts.app')
@section('content')
    <div align="center">
        <h3><?php echo ($field['field_name']); ?> Details </h3>
        </div>
	<br>
	<div class="container">	


        <table class="table table-striped table-bordered table-hover">
			<tbody>
            <tr class="bg-info">
            <tr>
                <td>Field Name</td>
                <td><?php echo ($field['field_name']); ?></td>
            </tr>
            <tr>
                <td>Field Address</td>
                <td><?php echo ($field['field_address']); ?></td>
            </tr>
            <tr>
                <td>Field City </td>
                <td><?php echo ($field['field_city']); ?></td>
            </tr>
            <tr>
                <td>Field State</td>
                <td><?php echo ($field['field_state']); ?></td>
            </tr>
            <tr>
                <td>Field Zipcode </td>
                <td><?php echo ($field['field_zipcode']); ?></td>
            </tr>
            <tr>
                <td>Field Owner Organization</td>
                <td><?php echo ($field['field_owner_org']); ?></td>
            </tr>
            <tr>
                <td>Field Owner Name</td>
                <td><?php echo ($field['field_owner_name']); ?></td>
            </tr>
            <tr>
                <td>Field Owner Email</td>
                <td><?php echo ($field['field_owner_email']); ?></td>
            </tr>
            <tr>
                <td>Field Owner Contact Number</td>
                <td><?php echo ($field['field_owner_contactno']); ?></td>
            </tr>
            <tr>
                <td>Field Notes</td>
                <td><?php echo ($field['field_notes']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>

	@stop


