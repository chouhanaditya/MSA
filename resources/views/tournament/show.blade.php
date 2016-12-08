@extends('layouts.app')
@section('content')
    <div align="center">
    <h3><?php echo ($tournament['tournament_name']); ?> Details </h3>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Tournament Name</td>
                <td><?php echo ($tournament['tournament_name']); ?></td>
            </tr>
            <tr>
                <td>Tournament Prize Money</td>
                <td><?php echo ($tournament['tournament_price_money']); ?></td>
            </tr>
            <tr>
                <td>Tournament Sponsers</td>
                <td><?php echo ($tournament['tournament_sponsers']); ?></td>
            </tr>
            <tr>
                <td>Tournament Start Date </td>
                <td><?php echo ($tournament['tournament_start_date']); ?></td>
            </tr>
            <tr>
                <td>Tournament End Date</td>
                <td><?php echo ($tournament['tournament_end_date']); ?></td>
            </tr>
            <tr>
                <td>Participating Teams</td>
                <td>
                    @foreach ($team_names as $team_name)
                    
                    <?php echo ($team_name); ?>
                    <br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Matches Played</td>
                <td> 
                             @foreach ($Tournament_matches as $match)
                                <div>
                                    <a href="{{url('match',$match->id)}}" > Team {{ $match->match_team1_id }} vs Team {{ $match->match_team2_id }}</a>
                                </div>
                             @endforeach
                </td>
            </tr>
          
            </tbody>
        </table>
    </div>
@stop

