@extends('layouts.app')
@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/match/teamSelected') }}">
{{ csrf_field() }}

    <h3 style="text-align: center;  margin-top: 20px;">  
    <?php echo ($user_teamname); ?> - Playing 11 Selection
    </h3>
    <br>

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

             @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="panel-heading">Select the match for which you want to select playing 11:</div>
                
                <div class="panel-body">


                    <table class="table table-striped table-bordered table-hover">
                        @if(count($user_matches)==0)
                        <h3> Your team do not have any match scheduled.</h3>

                        @else
                        <thead>
                        <tr class="bg-info">
                            <th>Match Name</th>
                            <th>Playing Teams</th>
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
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>
            </div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Below are your team players:</div>
            <div class="panel-body">
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



                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Save
                    </button>
                


             </div>

             </div>
            
             </div>
             </div>
             </div>

</form>
@stop

