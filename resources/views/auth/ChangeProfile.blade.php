@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/ProfileChanged') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address Line</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">
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
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                            <label for="zipcode" class="col-md-4 control-label">Zip code</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('contactno') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">Contact number</label>

                            <div class="col-md-6">
                                <input id="contactno" type="text" class="form-control" name="contactno" value="{{ old('contactno') }}">
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
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('security_answer1') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">Security Answer 1</label>

                            <div class="col-md-6">
                                <input id="security_answer1" type="text" class="form-control" name="security_answer1" value="{{ old('security_answer1') }}">
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
                             </div>
                        </div>

            <div class="form-group{{ $errors->has('security_answer2') ? ' has-error' : '' }}">
                <label for="state" class="col-md-4 control-label">Security Answer 2</label>

                <div class="col-md-6">
                    <input id="security_answer2" type="text" class="form-control" name="security_answer2" value="{{ old('security_answer2') }}">

                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
