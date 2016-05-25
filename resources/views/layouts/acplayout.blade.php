<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    {!! Html::style('css/css.css') !!}

    <style>
        body {
            font-family: 'Lato';
            background-color:#26C4C0;
            padding-top:75px;
            padding-bottom:75px;
        }

        .fa-btn {
            margin-right: 6px;
        }

        .container {
            background-color:#26C4C0;
            position:absolute;
            margin: 0 auto;
            width:70%;
            padding-bottom:25px;
            height:100vh;
            border-right: 1px solid white;
        }

        .container-2 {
            background-color:#26C4C0;
            right:15px;
            position:absolute;
            width:28%;
            padding-top:25px;
            padding-bottom:25px;
            height:100vh;
        }
    </style>
</head>
<body id="app-layout">

    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ Session::get('flash_notification.message') }}
        </div>
    @endif

    <div class="container">
        <div class="navacp">haloooo</div>
        @yield('content')
    </div>

    <div class="container-2">
        <div class="nav-side-menu" style="width:29%; padding-left:0px;">
            <div class="brand">Nawigacja Panelu Blogger'a</div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="menu-content collapse out">
                    <li>
                        <a href="#">
                            <i class="fa fa-dashboard fa-lg"></i> Dashboard
                        </a>
                    </li>

                    <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                        <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="products">
                        <li class="active"><a href="#">CSS3 Animation</a></li>
                        <li><a href="#">General</a></li>
                        <li><a href="#">Buttons</a></li>
                        <li><a href="#">Tabs & Accordions</a></li>
                        <li><a href="#">Typography</a></li>
                        <li><a href="#">FontAwesome</a></li>
                        <li><a href="#">Slider</a></li>
                        <li><a href="#">Panels</a></li>
                        <li><a href="#">Widgets</a></li>
                        <li><a href="#">Bootstrap Model</a></li>
                    </ul>


                    <li data-toggle="collapse" data-target="#service" class="collapsed">
                        <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
                    </li>  
                    <ul class="sub-menu collapse" id="service">
                        <li>New Service 1</li>
                        <li>New Service 2</li>
                        <li>New Service 3</li>
                    </ul>


                    <li data-toggle="collapse" data-target="#new" class="collapsed">
                        <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li>New New 1</li>
                        <li>New New 2</li>
                        <li>New New 3</li>
                    </ul>


                    <li>
                        <a href="#">
                            <i class="fa fa-user fa-lg"></i> Profile
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-users fa-lg"></i> Users
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
