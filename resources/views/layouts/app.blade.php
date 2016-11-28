<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Missouri Soccer Association</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        #outer-div {
            text-align: center;
            background-color: lightgray;
            width: 30%;
            height: auto;
            border: 1px solid black;
            padding: 10px;
        }
        #inner-div {            
            background-color: lightgray;
            width: 90%;
            height: auto;
            border: 1px dashed black;
            padding: 10px;
            margin: 20px;
        }
        .right {
            position: absolute;
            right: 20px; 
            overflow-y:scroll; 
            height: 50%;          
        }
        .left {
            position: absolute;
            left: 20px;    
        }
        .center {
            margin: auto;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <h4><a class="navbar-brand" href="{{ url('/') }}">
                    Missouri Soccer Association
                </a></h4>

                <br>
                <br>
                <br>
                <div >
                <a href="{{ action('SchoolController@index') }}">Schools</a> &nbsp;| &nbsp;
                <a href="{{ action('TeamController@index') }}">Teams</a> &nbsp;|&nbsp;
                <a href="{{ action('PlayerController@index') }}">Players</a> &nbsp;|&nbsp;
                <a href="{{ action('FieldController@index') }}">Fields</a>&nbsp;|&nbsp;                &nbsp;
                <a href="{{ action('MatchController@index') }}">Matches</a>&nbsp;|&nbsp;
                <a href="{{ action('TournamentController@index') }}">Tournaments</a>
            </div>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                {{--<!-- Left Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li><a href="{{ url('/home') }}">Home</a></li>--}}
                {{--</ul>--}}

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                <li><a href="{{ url('/ChangeProfile') }}"><i class="fa fa-btn fa-sign-out"></i>Edit Profile</a></li>
                            </ul>
                        </li>

                    @endif
                    <!-- <li> 
                    {!! Form::label('date_created',Carbon\Carbon::today()->toDateString()) !!}
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
