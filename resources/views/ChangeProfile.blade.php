@extends('layouts.app')

@section('content')
{!! Form::model($user,['method' => 'Post','action'=>['ProfileController@postChangeProfile']]) !!}
{{ csrf_field() }}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                 @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
    
    
                <div class="panel-body">
                    
                    <div class="col-md-6">
                            <br>{!! Form::label('email', 'Email:*') !!}
                    <input id="email" type="text" class="form-control" name="email" readonly="true" value={{$user->email}}>
                    </div>
                  
                   <div class="col-md-6">
                            <br>{!! Form::label('name', 'Name:*') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="col-md-6">
                            <br>{!! Form::label('address', 'Address Line:*') !!}
                            {!! Form::text('address',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                            <br>{!! Form::label('city', 'City:*') !!}
                            {!! Form::text('city',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                            <br>{!! Form::label('state', 'State:*') !!}


                            <select class="form-control" name="state" value="{{ old('state') }}">
                                
                                <option value="AZ" {{$user->state === 'AZ' ? 'selected' : ''}}>AZ</option>
                                <option value="NE" {{$user->state === 'NE' ? 'selected' : ''}}>NE</option>
                                <option value="MS" {{$user->state === 'MS' ? 'selected' : ''}}>MS</option>
                            </select>
                            
                    </div>

                    <div class="col-md-6">
                            <br>{!! Form::label('zipcode', 'Zipcode:*') !!}
                            {!! Form::text('zipcode',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="col-md-6">
                            <br>{!! Form::label('contactno', 'Contact Number:') !!}
                            {!! Form::text('contactno',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="col-md-6">
                            <br>{!! Form::label('role', 'Role:*') !!}

                            <select class="form-control" name="role" value="{{ old('role') }}">
                                 <option value="Coach" {{$user->role === 'Coach' ? 'selected' : ''}}>Coach</option>
                                <option value="Official" {{$user->role === 'Official' ? 'selected' : ''}}>Official</option>
                                <option value="Referee" {{$user->role === 'Referee' ? 'selected' : ''}} >Referee</option>
                            </select>
                         
                    </div>

                    <div class="col-md-6">
                            <br>{!! Form::label('security_question1', 'Security Question 1:*') !!}

                                <select class="form-control" name="security_question1" value="{{ old('security_question1') }}">
                                    <option value="Your first employer" {{$user->security_question1 === 'Your first employer' ? 'selected' : ''}} >Your first employer</option>
                                    <option value="Your mother maiden name" {{$user->security_question1 === 'Your mother maiden name' ? 'selected' : ''}}>Your mother maiden name</option>
                                    <option value="Your first car" {{$user->security_question1 === 'Your first car' ? 'selected' : ''}}>Your first car</option>
                                    <option value="Your favourite city" {{$user->security_question1 === 'Your favourite city' ? 'selected' : ''}}>Your favourite city</option>
                                    <option value="Your favourite holiday destination" {{$user->security_question1 === 'Your favourite holiday destination' ? 'selected' : ''}}>Your favourite holiday destination</option>

                                </select>
                    </div>

                    <div class="col-md-6">
                    <br>{!! Form::label('security_answer1', 'Security Answer 1:*') !!}
                    <input id="security_answer1" type="text" class="form-control" name="security_answer1" value={{$user->security_answer1}}>

                    </div>


                    <div class="col-md-6">
                           <br>  <label for="security_question2" >Security Question 2*</label>

                                <select class="form-control" name="security_question2">
                                
                                 <option value="Your first employer" {{$user->security_question2 === 'Your first employer' ? 'selected' : ''}} >Your first employer</option>
                                    <option value="Your mother maiden name" {{$user->security_question2 === 'Your mother maiden name' ? 'selected' : ''}}>Your mother maiden name</option>
                                    <option value="Your first car" {{$user->security_question2 === 'Your first car' ? 'selected' : ''}}>Your first car</option>
                                    <option value="Your favourite city" {{$user->security_question2 === 'Your favourite city' ? 'selected' : ''}}>Your favourite city</option>
                                    <option value="Your favourite holiday destination" {{$user->security_question2 === 'Your favourite holiday destination' ? 'selected' : ''}}>Your favourite holiday destination</option>
   
                                </select>
                        </div>

                    <div class="col-md-6">
                    <br>  <label for="security_answer2" >Security Answer 2*</label>
                    <input id="security_answer2" type="text" class="form-control" name="security_answer2" value={{ $user->security_answer2 }}>
                    </div>


                    <div class="col-md-6">
                    <br>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Save Changes
                            </button>
                        
                    </div>        
        </div>
    </div>
</div>
@endsection
