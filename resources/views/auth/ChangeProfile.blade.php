@extends('layouts.app')

@section('content')
{!! Form::model($user,['method' => 'PATCH','route'=>['/ProfileChanged']]) !!}
{{ csrf_field() }}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile aaaa </div>
                <div class="panel-body">
                    
                    <div class="col-md-6">
                            <br>{!! Form::label('email', 'Email:*') !!}
                            <input id="email" class="form-control" name="email" value= {{<$user->email }} readonly="true">
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
                            <br>{!! Form::label('zipcode', 'Zipcode:*') !!}
                            {!! Form::text('zipcode',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                            <br>{!! Form::label('contactno', 'Contact Number:') !!}
                            {!! Form::text('contactno',null,['class'=>'form-control']) !!}
                    </div>


                    <div class="col-md-6">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                            <select class="form-control" name="state" value="{{ old('state') }}">
                                <option value="none">--Select--</option>
                                <option value="AZ">AZ</option>
                                <option value="NE">NE</option>
                                <option value="MS">MS</option>
                            </select>
                            </div>
                    </div>

                    <div class="col-md-6">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                            <select class="form-control" name="role" value="{{ old('role') }}">
                                <option value="none">--Select--</option>
                                <option value="Coach">Coach</option>
                                <option value="Official">Official</option>
                                <option value="Referee">Referee</option>
                            </select>
                            </div>
                    </div>

                    <div class="col-md-6">
                           <label for="security_question1" class="col-md-4 control-label">Security Question 1</label>

                            <div class="col-md-6">
                                <select class="form-control" name="security_question1" value="{{ old('security_question1') }}">
                                    <option value="none">--Select--</option>
                                    <option value="Your first employer">Your first employer</option>
                                    <option value="Your mother maiden name">Your mother maiden name</option>
                                    <option value="Your first car">Your first car</option>
                                    <option value="Your favourite city">Your favourite city</option>
                                    <option value="Your favourite holiday destination">Your favourite holiday destination</option>

                                </select>
                            </div>
                    </div>

                    <div class="col-md-6">
                            <label for="state" class="col-md-4 control-label">Security Answer 1</label>

                            <div class="col-md-6">
                                <input id="security_answer1" type="text" class="form-control" name="security_answer1" value="{{ old('security_answer1') }}">
                            </div>
                    </div>


                    <div class="col-md-6">
                            <label for="security_question2" class="col-md-4 control-label">Security Question 2</label>

                            <div class="col-md-6">
                                <select class="form-control" name="security_question2">
                                    <option value="none">--Select--</option>
                                    <option value="Your first employer">Your first employer</option>
                                    <option value="Your mother maiden name">Your mother maiden name</option>
                                    <option value="Your first car">Your first car</option>
                                    <option value="Your favourite city">Your favourite city</option>
                                    <option value="Your favourite holiday destination">Your favourite holiday destination</option>
                                </select>
                             </div>
                        </div>

                    <div class="col-md-6">
                            <label for="state" class="col-md-4 control-label">Security Answer 2</label>

                           <div class="col-md-6">
                                <input id="security_answer2" type="text" class="form-control" name="security_answer2" value="{{ old('security_answer2') }}">
                            </div>
                    </div>


                    <div class="col-md-6">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Save Changes
                            </button>
                        </div>
                    </div>        
                </div>

        </div>
    </div>
</div>
@endsection
