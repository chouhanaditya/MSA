@extends('layouts.app')
@section('content')
    <h3><?php echo ($player['player_name']); ?> Details </h3>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">

            <tr>
                <td>Team Name</td>
                <td><?php echo ($player->team->team_name); ?></td>
            </tr>
            <tr>
                <td>Player Name</td>
                <td><?php echo ($player['player_name']); ?></td>
            </tr>
            <tr>
                <td>Player Email</td>
                <td><?php echo ($player['player_email']); ?></td>
            </tr>
            <tr>
                <td>Player Address</td>
                <td><?php echo ($player['player_address']); ?></td>
            </tr>
            <tr>
                <td>Player City</td>
                <td><?php echo ($player['player_city']); ?></td>
            </tr>
            <tr>
                <td>Player State </td>
                <td><?php echo ($player['player_state']); ?></td>
            </tr>
            <tr>
                <td>Player Zipcode</td>
                <td><?php echo ($player['player_zipcode']); ?></td>
            </tr>
            <tr>
                <td>Player Contact Number</td>
                <td><?php echo ($player['player_contactno']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

