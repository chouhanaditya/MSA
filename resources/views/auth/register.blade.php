@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sign-up</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address Line</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                            <select class="form-control" name="state" value="{{ old('state') }}">
                                <option value="none">--Select--</option>
                                <option value="AZ">AZ</option>
                                <option value="NE">NE</option>
                                <option value="MS">MS</option>
                            </select>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <label for="zipcode" class="col-md-4 control-label">Zip code</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}">

                                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('contactno') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">Contact number</label>

                            <div class="col-md-6">
                                <input id="contactno" type="text" class="form-control" name="contactno" value="{{ old('contactno') }}">

                                @if ($errors->has('contactno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                            <select class="form-control" name="role" value="{{ old('role') }}">
                                <option value="none">--Select--</option>
                                <option value="Coach">Coach</option>
                                <option value="Official">Official</option>
                                <option value="Referee">Referee</option>
                            </select>

                            @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('security_question1') ? ' has-error' : '' }}">
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

                                @if ($errors->has('security_question1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('security_question1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('security_answer1') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">Security Answer 1</label>

                            <div class="col-md-6">
                                <input id="security_answer1" type="text" class="form-control" name="security_answer1" value="{{ old('security_answer1') }}">

                                @if ($errors->has('security_answer1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('security_answer1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('security_question2') ? ' has-error' : '' }}">
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

                                @if ($errors->has('security_question2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('security_question2') }}</strong>
                            </div>
                        </div>
                    </form>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('security_answer2') ? ' has-error' : '' }}">
                <label for="state" class="col-md-4 control-label">Security Answer 2</label>

                <div class="col-md-6">
                    <input id="security_answer2" type="text" class="form-control" name="security_answer2" value="{{ old('security_answer2') }}">

                    @if ($errors->has('security_answer2'))
                        <span class="help-block">
                            <strong>{{ $errors->first('security_answer2') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Register
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
