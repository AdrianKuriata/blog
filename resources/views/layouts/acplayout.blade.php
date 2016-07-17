<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {!! Html::style('summernote/summernote.css') !!}
    {!! Html::style('animate.css') !!}
    {!! Html::style('select2/dist/css/select2.min.css') !!}
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    
</head>
<body id="app-layout">
    <div class="container-4">
        <div class="navacp">
            Siemanko, {{\Auth::user()->username}}!
        </div>
        @yield('content')
    </div>

    <div class="container-2">
        <div class="nav-side-menu" style="width:29%; padding-left:0px;">
            <div class="brand">Nawigacja Panelu Blogger'a</div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="menu-content collapse out">
                    <!--<li  data-toggle="collapse" data-target="#products" class="collapsed active">
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
                    </ul>-->
                    <a href="/admin" style="text-decoration:none;">
                        <li>
                            <i class="fa fa-dashboard fa-lg"></i> Strona główna panelu
                        </li>
                    </a>

                    <a href="/" style="text-decoration:none;">
                        <li>
                            <i class="fa fa-home fa-lg"></i> Strona główna
                        </li>
                    </a>

                    <a href="/admin/newsletter" style="text-decoration:none;">
                        <li>
                            <i class="fa fa-newspaper-o fa-lg"></i> Newsletter
                        </li>
                    </a>

                    <a href="/admin/users" style="text-decoration:none;">
                        <li>
                            <i class="fa fa-user fa-lg"></i> Użytkownicy
                        </li>
                    </a>

                    <a href="/admin/posts" style="text-decoration:none;">
                        <li>
                            <i class="fa fa-clipboard fa-lg"></i> Posty <span class="label label-danger" style="font-size:15px">{{$countpost}}</span>
                        </li>
                    </a>

                    <a href="/admin/articles" style="text-decoration:none;">
                        <li>
                            <i class="fa fa-pencil fa-lg"></i> Wpisy
                        </li>
                    </a>

                    <a href="/logout" style="text-decoration:none;">
                        <li>
                            <i class="fa fa-sign-out fa-lg"></i> Wyloguj
                        </li> 
                    </a>
                </ul>
            </div>
            @if (Session::has('flash_notification.message'))
            <div id="not-message" class="alert alert-{{ Session::get('flash_notification.level') }} changed-notification">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                <center><i class="fa fa-info"></i> {{ Session::get('flash_notification.message') }}</center>
            </div>
            @endif
        </div>
    </div>

    <!-- JavaScripts -->
    {!! Html::script('jquery/jquery.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    {!! Html::script('summernote/summernote.js') !!}
    {!! Html::script('summernote/summernote-pl-PL.js') !!}
    {!! Html::script('select2/dist/js/select2.min.js') !!}


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('script')
</body>
</html>
