@extends('layouts.app')
@section('content')
    {!! Form::model($player,['method' => 'PATCH','route'=>['player.update',$player->id]]) !!}

    @if ($flag)
    
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
    
                <div class="panel-heading">Update Details</div>                
                <div class="panel-body">

                        <div align="center">
                            {!! Form::label('player_email', 'Player Email:') !!}
                            {!! Form::text('player_email',null, ['class'=>'form','readonly'=>'true']) !!}
                        </div>

                        <div class="col-md-6">
                           <br> {!! Form::label('player_name', 'Player Name:*') !!}
                            {!! Form::text('player_name',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-6">
                           <br> {!! Form::label('player_address', 'Player Address:*') !!}
                            {!! Form::text('player_address',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                        <br>    {!! Form::label('player_city', 'Player City:*') !!}
                            {!! Form::text('player_city',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('player_state', 'Player State:*') !!}
                            {!! Form::text('player_state',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-6">
                            <br>{!! Form::label('player_zipcode', 'Player Zipcode:*') !!}
                            {!! Form::text('player_zipcode',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <br>{!! Form::label('player_contactno', 'Player Contact Number:*') !!}
                            {!! Form::text('player_contactno',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-6">
                          <br>  {!! Form::label('player_eligibility_status', 'Player Eligibility:*') !!}
                            <br>
                            <input type="radio"  name="player_eligibility_status" value="In">  In
                            <br>
                            <input type="radio"  name="player_eligibility_status" value="Out">  Out
                        </div>

</div>
</div>                        
                        <div class="col-md-6">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
 
        @else
        <div class="alert alert-danger">
            <h3>You are not authorized to update player information of players of the other team.</h3>
        </div>

        @endif

            </div>  
        </div>
    </div>

   {!! Form::close() !!}

@stop

