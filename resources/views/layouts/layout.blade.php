<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('pages.title')</title>
    <meta name="description" content="@yield('meta-description','El vostre bloc')">
    <link rel="icon" href="/img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/vendors/linericon/style.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/css/style.css">

    @stack('styles')
</head>
<body>
    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    {{-- <a class="navbar-brand logo_h" href="{{route('pages.home')}}"><img src="/img/logo.png" alt=""></a> --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-right">
                            <li class="nav-item {{ Request::routeIs('pages.home') ? 'active' : ''}}"><a class="nav-link" href="{{route('pages.home')}}">@lang('pages.home')</a></li>
                            {{-- <li class="nav-item" {{ Request::routeIs('pages.writers') ? 'active' : ''}}><a class="nav-link" href="#">Escriptors</a></li> --}}
                            {{-- <li class="nav-item {{ Request::routeIs('pages.category') ? 'active' : ''}}"><a class="nav-link" href="{{route('pages.category')}}">@lang('pages.categories')</a> --}}
                            <li class="nav-item {{ Request::routeIs('pages.contact') ? 'active' : ''}}"><a class="nav-link" href="{{route('pages.contact')}}">@lang('pages.contact')</a></li>
                            <li class="nav-item nav-item-push-right"><a class="nav-link" href="{{route('login')}}">@lang('pages.writers')</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mr-5" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        </ul>

                        <ul class="nav navbar-nav navbar-right navbar-social">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    @yield('content')

    <!--================ Start Footer Area =================-->
    <footer class="footer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>@lang('pages.us')</h6>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
                        magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>@lang('pages.newsletter')</h6>
                        <p>@lang('pages.lastposts')</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                <input class="form-control" name="EMAIL" placeholder="@lang('pages.emailform')" type="email">


                                <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                </div>

                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>@lang('pages.followus')</h6>
                        <p>@lang('pages.socialnet')</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> @lang('pages.designed') <i class="fa fa-heart" aria-hidden="true"></i> @lang('pages.by') <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </footer>
    <!--================ End Footer Area =================-->

  <script src="/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="/js/jquery.ajaxchimp.min.js"></script>
  <script src="/js/mail-script.js"></script>
  <script src="/js/main.js"></script>

  @stack('scripts')
</body>
</html>
