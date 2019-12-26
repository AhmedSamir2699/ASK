
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <style>
.brand-image2 {
       /* float: left; */
    max-height: 57px;
    margin-left: 385px;
    margin-top: -14px;
    margin-bottom: -12px;
}
.card {
    position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
    margin-top: 55px;
    margin-right: 172px;
    margin-left: 51px;
}
       .form-control
       {
               width: 165%;
             margin-left: 139px;
       }
       .link {
    color: #ee4c22;
    text-decoration: underline;
    float: right;
    margin-right: -200px;
}
.form-check {
    position: relative;
    display: block;
    padding-left: 1.25rem;
    margin-top: -30px;
    float: right;
    margin-right: -39px;
}
.btn {
    margin-left: 140px;
    /* float: right; */
    width: 360px;
    margin-top: -12px;
    margin-bottom: 15px;
    background-color: #ee4c22;
    color:#fff;
}
a:hover {
    color: #ee4c22;
    text-decoration: underline;
}
input[type="checkbox"] {
  visibility: hidden;
}
label {
  cursor: pointer;
}
input[type="checkbox"] + label:before {
  border: 1px solid #333;
  content: "\00a0";
  display: inline-block;
  font: 16px/1em sans-serif;
  height: 16px;
  margin: 0 .25em 0 0;
  padding: 0;
  vertical-align: top;
  width: 16px;
}
input[type="checkbox"]:checked + label:before {
  background: #ee4c22;
  color: #fff;
  content: "\2713";
  text-align: center;
}
input[type="checkbox"]:checked + label:after {
  font-weight: bold;
}

input[type="checkbox"]:focus + label::before {
    outline: rgb(59, 153, 252) auto 5px;
}
.nav-link
{
    margin-right: -291px;
    color: #ee4c22;
    font-weight: bold;
}
.nav-link:hover
{
     margin-right: -291px;
    color:#fff;
    background-color:#ee4c22
}
.nav-link2
{
    margin-right: 414px;
    color: #ee4c22;
    font-weight: bold;
}
.nav-link2:hover
{
    margin-right: 414px;
    padding:8px;
    color:#fff;
    background-color:#ee4c22;
    text-decoration:none;
}
.nav-link2:active
{
    margin-right: 414px;
    margin-left:5px;

    padding:10px
}

    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->

  <!-- logo -->
     <a href="index3.html">
      <img src="./img/orange.png" alt="ask Logo" class="brand-image2 ">
    </a>

                 @if (Route::has('register'))

                        <a class="nav-link" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                         <a class="nav-link2" href="{{ route('login') }}">{{ __('login') }}</a>

                  @endif
  </nav>

       <div class="content">
      <div class="container-fluid">
            @yield('content')
        </div>
         </div>
    </div>
</body>
</html>
