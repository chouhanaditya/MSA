@extends('layouts.app')

@section('content')

    @if ((Auth::check())&&($role=='Official'))
    <a href="{{url('/match/create')}}" class="btn btn-success" style="text-align: right";>Schedule New Match</a>
    @endif

    <h1 style="text-align: center; font-size: x-large; margin-top: 20px;">Match Fixtures</h1>
    <br>

<div id="outer-div" class="right">
  Upcoming Matches
  @foreach ($Future_matches as $match)

    <div id='inner-div' class='center'>
        <a href="{{url('match',$match->id)}}" >{{ $match->match_team1_id }} vs {{ $match->match_team2_id }}</a>   
    </div>

  @endforeach
</div>

<div id="outer-div" class="left">
 Past Matches
 @if ($Prev_matches == null)
     @foreach ($Prev_matches as $match)
      <div id='inner-div' class='center'>
          <a href="{{url('match',$match->id)}}" >{{ $match->match_team1_id }} vs {{ $match->match_team2_id }}</a>      
      </div>
      @endforeach
  @endif

</div>
<div id="outer-div" class="center">
    @if (count($Today_matches)<=0)

      No matches scheduled for today.

    @else

     Today's Matches
   
      @foreach ($Today_matches as $match)

      <div id='inner-div' class='center'>
        <a href="{{url('match',$match->id)}}" >{{ $match->match_team1_id }} vs {{ $match->match_team2_id }}</a>   
      </div>

      @endforeach

    @endif

</div>

@endsection

