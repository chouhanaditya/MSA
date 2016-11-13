@extends('layouts.app')
@section('content')
    <div align="center">
    <h3><?php echo ($team['team_name']); ?> Details </h3>
        </div>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Team Name</td>
                <td><?php echo ($team['team_name']); ?></td>
            </tr>
            <tr>
                <td>School Name</td>
                <td><?php echo ($team->school->school_name); ?></td>
            </tr>
            <tr>
                <td>Coach Name</td>
                <td><?php echo ($team->user->name); ?></td>
            </tr>
            <tr>
                <td>Coach Mobile </td>
                <td><?php echo ($team['coach_mobile']); ?></td>
            </tr>
            <tr>
                <td>Matches Won</td>
                <td><?php echo ($team['matches_won']); ?></td>
            </tr>
            <tr>
                <td>Matches Lost</td>
                <td><?php echo ($team['matches_lost']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

