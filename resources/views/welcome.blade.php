<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <title>ASK simple App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
               background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                 height: 100%;
                margin: 0;
               background-image:url('./img/back.jpg');
              background-size: 100% 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .brand-image
            {
                   max-height: 80px;

            }
            .brand-image2 {

                height: 44px;
                max-height: 51px;
                margin-left: 512px;
                margin-top: -15px;
                margin-bottom: -14px;
                 }
                 .btn
                 {
                     background-color:transparent;
                     margin: 20px auto 0px;
                      width: 300px;
                     padding: 10px;
                 }
                  .btn2
                 {

                         color:#784589;
                         width: 300px;
                        min-width: 300px;
                        background: #fff;

                 }
                 .content {
                    text-align: center;
                    margin-top: -206px;
                  }

        </style>
    </head>
    <body>
     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="./img/purble.png" alt="Ask Logo" class="brand-image2 ">
                </a>
            </div>
        </nav>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                 <img src="./img/cat.gif" alt="lara Logo" class="brand-image ">
                </div>
 <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-light btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-light btn2" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>

        </div>

    </body>
</html>
