@extends('layouts.app')
@section('content')

    @if ($flag=='true')
    <a href="{{route('match.edit',$match->id)}}" class="btn btn-success" style="text-align: right";>Update Details</a>
    @endif

    <div align="center">
    <h3> <?php echo ($match['match_name']); ?> Details </h3>
    </div>
    <div id="outer-div" class="center">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
            <td colspan="2">
                 <h4>{{ $match->match_team1_id }} vs {{ $match->match_team2_id }} </h4>
            </td>
           
            <tr>
                <td><?php echo  ($match['match_team1_id']); ?> </td>
                <td><?php echo ($match['match_team2_id']); ?> </td>

            </tr>
             <tr>
                <td><?php echo ($match['match_team1_score']); ?></td>
                <td><?php echo ($match['match_team2_score']); ?></td>
            </tr>
              <tr>

                <td><?php echo ($match['match_team1_goals']); ?></td>
                <td><?php echo ($match['match_team2_goals']); ?></td>
            </tr>


            <tr>
                <td colspan="2">
                     <h5>Match Date and Timings </h5>
                </td>
            </tr>
            
             <tr>
                <td>Match Date </td>             
                <td><?php echo ($match['match_date']); ?></td>
            </tr>
            <tr>
                <td>Start Time </td>
                <td><?php echo ($match['match_start_time']); ?></td>
            </tr>
                        <tr>
                <td>Half Time</td>
                <td><?php echo ($match['match_half_time']); ?></td>
            </tr>
            <tr>
                <td>End Time</td>
                <td><?php echo ($match['match_end_time']); ?></td>
            </tr>

            <tr>
                <td>Played at</td>
                <td><?php echo ($match['field_id']); ?></td>
            </tr>
                <tr>
                <td>Referee Name</td>
                <td><?php echo ($referee_name); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

