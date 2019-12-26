
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>ASK</title>
  <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
<body class="hold-transition sidebar-mini">

<div class="wrapper"  id="app">


  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->

  <!-- logo -->
     <a href="index3.html">
      <img src="./img/ASK.png" alt="lara Logo" class="brand-image2 ">
    </a>

    <div class="tools">
          <span>
            <router-link to="/dashboard">
            <i class="fa fa-home"></i>
            </router-link>
          </span>

         <span>
            <router-link to="/question">
            <i class="fa fa-question-circle"></i>
            </router-link>
          </span>

           <span>
            <router-link to="/profile">
           <i class="fas fa-user-circle"></i>
            </router-link>
          </span>

           <span>
            <router-link to="/users">
           <i class="fas fa-user-friends"></i>
            </router-link>
          </span>

           <span>
            <router-link to="/developer" >
              <i class="fas fa-bolt"></i>
            </router-link>
          </span>



       <span class="dropdown nav-item has-treeview geer">

            <i class="dropdown-toggle fas fa-cog"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

           <div class="dropdown-menu">

               <a class="dropdown-item" href="#">Sitting</a>
                <a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                    {{ __('Logout') }}

                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


        </div>
          </span>
          </div>
  </nav>

  <!--
  <nav class="main-header navbar navbar-expand navbar navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>



  </nav>
  navbar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
                 <router-view></router-view>
                 <vue-progress-bar></vue-progress-bar>
            </div>
          </div>
     </div>



</div>

@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth
<script src="/js/app.js"></script>

</body>
</html>
