@extends('layouts.app')
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-horizontal" role="form" method="POST" action="{{ url('/match/teamSelected') }}">
{{ csrf_field() }}

    <h3 style="text-align: center;  margin-top: 20px;">  
    <?php echo ($user_teamname); ?> - Playing 11 Selection
    </h3>
    <br>
<h4>Select match for which you want to select team: </h4>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Match Name</th>
            <th>Teams</th>
            <th>Match Date</th>
            <th>Match Time</th>
        </tr>
        </thead>
        
        <tbody>
        @foreach ($user_matches as $match)
            <tr>
                <td><input type="radio" name="match_id" value={{ $match->id }} >  {{ $match->match_name }}</td>
                <td>{{ $match->match_team1_id }} vs {{ $match->match_team2_id }}</td>
                <td>{{ $match->match_date }}</td>
                <td>{{ $match->match_start_time }}</td>                  
            </tr>
        @endforeach

        </tbody>
    </table>

<h4>Below are your team players: </h4>  
     <table class="table table-striped table-bordered table-hover">     
     <thead>
        <tr class="bg-info">
            <th>Player Name</th>       
        </tr>
        </thead>        
        <tbody>
        @foreach ($myplayers as $player)
        <tr>
            <td><input type="checkbox"  name="match_players[]" value={{ $player->id }} >   {{ $player->player_name }}</td>
        </tr>
    @endforeach
        </tbody>
     </table>

     <div class="form-group">

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Save
                    </button>
                
    </div>
</form>
@stop

