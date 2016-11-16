@extends('layouts.app')

@section('content')

    @if ((Auth::check())&&($role=='Official'))
      <a href="{{url('/match/create')}}" class="btn btn-success" style="text-align: right";>Schedule New Match</a>
    @endif

    @if ((Auth::check())&&($role=='Coach'))
      <a href="{{url('/match/teamSelection')}}" class="btn btn-success" style="text-align: right";>Team Selection</a>
    @endif

    <h2 style="text-align: center;  margin-top: 20px;">Match Fixtures</h2>
    <br>

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

@endsection

