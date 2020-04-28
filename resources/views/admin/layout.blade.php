<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

<title>{{config('app.name')}}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminLte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminLte/css/adminlte.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="/adminLte/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Flag icons  -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">


  @stack('styles')

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            @if (!Request::routeIs('admin'))
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('admin')}}" class="nav-link">@lang('global.dashboard')</a>
                </li>
            @endif
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">@lang('global.contact')</a>
            </li>
            </ul>

            {{-- <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form> --}}
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Languages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (app()->getLocale() == 'ca')
                            <img class="avatar" src="/img/catalonia.png" alt="" width="20" height="20">
                        @else
                            <img class="avatar" src="/img/spain.png" alt="" width="20" height="20">
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('setLocale', ['es']) }}">@lang('global.spanish')</a>
                        <a class="dropdown-item" href="{{ route('setLocale', ['ca']) }}">@lang('global.catalan')</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i><span class="logout">@lang('global.deletesession')</span>
                    </a>
                    {{-- <p>Sidebar content</p> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <img src="/adminLte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">@lang('global.blog')</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if (auth()->user()->avatar == 'avatar-icon.png')
                        <img src="/img/avatars/avatar-icon.png" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="/storage/avatars/{{auth()->user()->avatar}}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                <a href="{{route('admin.users.show',auth()->user())}}" class="d-block mb-3">{{auth()->user()->name}}</a>
                <a href="#">{{auth()->user()->getRolesDisplayNames()->implode(', ')}}</a>
                </div>
            </div>

                <!-- Sidebar Menu -->
                @include('admin.partials.sidebar')

            </div>
            <!-- /.sidebar -->
        </aside>


         @yield('content')



        <!-- Main Footer -->
        <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            <span>@lang('global.designed') <i class="fas fa-heart"></i> @lang('global.by') Formal Web</span>
        </div>
        <!-- Default to the left -->
        <p><span>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
            @lang('global.rights')
            </span></p>
        </footer>
    </div>
    <!-- ./wrapper -->
</body>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/adminLte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminLte/js/adminlte.min.js"></script>


 @stack('scripts')

 @include('admin.posts.create')



 @unless(Request::is('admin/posts/*'))
    <script>
        if( window.location.hash === ('#create')){
            $('#exampleModal').modal('show');
        }

        $('#exampleModal').on('hide.bs.modal', function(){
        window.location.hash = '#';
        });

        $('#exampleModal').on('shown.bs.modal', function(){
        $('#InputTitle').focus();
        window.location.hash = '#';s
        });
    </script>
 @endunless

</body>
</html>
