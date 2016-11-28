@extends('layouts.app')

@section('content')

    <div>   
      <h2 style="text-align: center">Match Fixtures</h2> 
    </div> 

    @if ((Auth::check())&&($role=='Official'))
    <div class="pull-left">
      <a href="{{url('/match/create')}}" class="btn btn-success" style="text-align: right";>Schedule New Match</a>
    </div>
    @endif

    @if ((Auth::check())&&($role=='Coach'))
      <div class="pull-left">
        <a href="{{url('/match/teamSelection')}}" class="btn btn-success" style="text-align: right";>Team Selection</a>
    </div>  
    @endif

    <br>
    <br>
    <br>

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">

<div id="outer-div" class="left">
<h4> Past Matches </h4>

     @foreach ($Prev_matches as $match)
      <div id='inner-div' class='center'>
          <a href="{{url('match',$match->id)}}" > Team {{ $match->match_team1_id }} vs Team {{ $match->match_team2_id }}</a>      
      </div>
      @endforeach
  

</div>

<div id="outer-div" class="right">
  <h4>Upcoming Matches </h4>
  @foreach ($Future_matches as $match)

    <div id='inner-div' class='center'>
        <a href="{{url('match',$match->id)}}" >Team {{ $match->match_team1_id }} vs Team {{ $match->match_team2_id }}</a>   
    </div>

  @endforeach
</div>

<div id="outer-div" class="center">

<h4> Today's Matches </h4>
      

    @if (count($Today_matches)<=0)
<div>
      No match scheduled for today.
</div>
    @else
   
      @foreach ($Today_matches as $match)

      <div id='inner-div' class='center'>
        <a href="{{url('match',$match->id)}}" > Team {{ $match->match_team1_id }} vs Team {{ $match->match_team2_id }}</a>   
      </div>

      @endforeach

    @endif

</div>
</table>
</div>
@endsection

