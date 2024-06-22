<!doctype html>
<html lang="en">

<head>
  <title>Night Star</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Reddit+Mono:wght@200..900&display=swap" rel="stylesheet">

  <!-- Bootstrap Stylesheet -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  {{--
  <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}"> --}}

  <!-- Font Awesome Stylesheet -->
  <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css') }}">
  {{--
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous"> --}}


  <!-- Custom Stylesheets -->
  <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
  <link rel="stylesheet" id="cpswitch" href="{{ asset('client/css/orange.css') }}">
  <link rel="stylesheet" href="{{ asset('client/css/responsive.css') }}">

  <!-- Owl Carousel Stylesheet -->
  <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('client/css/owl.theme.css') }}">

  <!-- Flex Slider Stylesheet -->
  <link rel="stylesheet" href="{{ asset('client/css/flexslider.css') }}" type="text/css" />

  <!--Date-Picker Stylesheet-->
  <link rel="stylesheet" href="{{ asset('client/css/datepicker.css') }}">

  <!-- Magnific Gallery -->
  <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css') }}">
  <style>
    .recolor>span:hover {
      color: rgb(204, 139, 19) !important;
      /* màu chữ khi hover */
      font-weight: bold;
      border-bottom: 2px solid rgb(204, 139, 19);
    }
  </style>
</head>

<body id="main-homepage">

  <!--====== LOADER =====-->
  <div class="loader"></div>

  <!--============= TOP-BAR ===========-->
  <div id="top-bar" class="tb-text-white" style="height: 45px">

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div id="info">
            <ul class="list-unstyled list-inline">
              <li><span><i class="fa fa-map-marker"></i></span>29 Land St, Lorem City, CA</li>
            </ul>
          </div><!-- end info -->
        </div><!-- end columns -->

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div id="links" style="margin-top: -4px">
            @if (!Auth::check())
              <ul class="list-unstyled list-inline" style="display: flex">
                @if (Route::has('login'))
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#staticLogin"
                      href="">{{ __('Đăng Nhập') }}</a>
                  </li>
                  <!--===== Login ====-->
                  <section class="innerpage-wrapper modal fade" id="staticLogin" data-login="static"
                    data-keyboard="false" tabindex="-1" aria-labelledby="staticLoginLabel" aria-hidden="true">
                    <div id="login" class="innerpage-section-padding modal-dialog">
                      <div class="container modal-content">

                        <div class="row modal-body">
                          <div class="col-sm-12">

                            <div class="flex-content">
                              <div class="custom-form custom-form-fields">
                                <h3 class="text-center">Đăng Nhập</h3>
                                <h2 class="text-center"><i class="fa fa-building"></i>NightStar Hotel</h2>
                                <form method="POST" action="{{ route('login') }}" id="loginForm">
                                  @csrf @method('POST')
                                  <div class="form-group w-100">
                                    <input type="email" class="form-control" placeholder="Địa Chỉ Email"
                                      name="email" />
                                    @error('email')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group w-100 mt-4">
                                    <input type="password" class="form-control" placeholder="Mật Khẩu"
                                      name="password" />
                                    @error('password')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="checkbox mt-4" style="margin-bottom: 4px">
                                    <label><input type="checkbox" name="remember" id="remember">
                                      <h6 class="d-inline ml-1">Remember me</h6>
                                    </label>
                                  </div>
                                  <div class="error text-danger" id="loginError"></div>
                                  <button class="btn btn-orange btn-block">Đăng Nhập</button>
                                </form>

                                <button type="button" class="btn btn-secondary float-right"
                                  data-dismiss="modal">Cancel</button>
                              </div><!-- end custom-form -->
                            </div><!-- end form-content -->
                          </div><!-- end columns -->
                        </div><!-- end row -->
                      </div><!-- end container -->
                    </div><!-- end login -->
                  </section><!-- end login -->
                @endif

                @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal"
                      data-target="#staticRegister">{{ __('Đăng Ký') }}</a>
                  </li>
                  {{-- Register --}}
                  <section class="innerpage-wrapper modal fade" id="staticRegister" data-register="static"
                    data-keyboard="false" tabindex="-1" aria-labelledby="staticRegisterLabel" aria-hidden="true">
                    <div id="login" class="innerpage-section-padding modal-dialog">
                      <div class="container modal-content">

                        <div class="row modal-body">
                          <div class="col-sm-12">

                            <div class="flex-content">
                              <div class="custom-form custom-form-fields">
                                <h3 class="text-center">Đăng Ký</h3>
                                <h2 class="text-center"><i class="fa fa-building"></i>NightStar Hotel</h2>
                                <form method="POST" action="{{ route('register') }}" id="registerForm">
                                  @csrf @method('POST')
                                  @session('success_msg')
                                    <div id="successMessage"
                                      class="alert alert-succes alert-dismissible fade show d-none" role="alert"
                                      style="background: green; width: 50%; margin: auto">
                                      <strong>Chúc mừng!!</strong><span id="successText"></span>
                                      <button type="button" class="close" style="float:right" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                  @endsession
                                  <div class="form-group w-100">
                                    <input type="text" class="form-control" placeholder="Tên Người Dùng"
                                      name="name" />
                                    <span class="text-danger" id="error-name"></span>
                                  </div>
                                  <div class="form-group w-100 mt-4">
                                    <input type="email" class="form-control" placeholder="Địa Chỉ Email"
                                      name="email" />
                                    <span class="text-danger" id="error-email"></span>
                                  </div>

                                  <div class="form-group w-100 mt-4">
                                    <input type="tel" class="form-control" placeholder="Số Điện Thoại"
                                      name="phone" />
                                    <span class="text-danger" id="error-phone"></span>
                                  </div>

                                  <div class="form-group w-100 mt-4">
                                    <input type="password" class="form-control" placeholder="Mật Khẩu"
                                      name="password" />
                                    <span class="text-danger" id="error-password"></span>
                                  </div>

                                  <div class="form-group w-100 mt-4">
                                    <input type="password" class="form-control" placeholder="Xác Nhận Mật Khẩu"
                                      name="password_confirmation" />
                                    <span class="text-danger" id="error-password_confirmation"></span>
                                  </div>

                                  <span id="registerError" class="text-danger mt-3"></span>
                                  <button class="btn btn-orange btn-block">Đăng Ký</button>
                                </form>
                                <button type="button" class="btn btn-secondary float-right"
                                  data-dismiss="modal">Cancel</button>
                              </div><!-- end custom-form -->

                            </div><!-- end form-content -->


                          </div><!-- end columns -->
                        </div><!-- end row -->
                      </div><!-- end container -->
                    </div><!-- end login -->
                  </section><!-- end login -->
                @endif
              </ul>
            @else
              <ul class="list-unstyled list-inline" style="display: flex;align-items: self-end;">
                <li><a href="{{ url('/info/'.Auth::user()->id) }}">
                    <span class="font-weight-bolder" style="color: white; font-size: 500">Hi,
                      {{ Auth::user()->name }}</span></a></li>

                <li class="">
                  <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-group-sm btn-danger">
                      <span>Đăng Xuất</span>
                    </button>
                  </form>
                </li>
              </ul>
            @endif
          </div><!-- end links -->
        </div><!-- end columns -->
      </div><!-- end row -->
    </div><!-- end container -->
  </div><!-- end top-bar -->

  <nav class="navbar navbar-default main-navbar navbar-custom navbar-white " id="mynavbar-1" style="height: 70px">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" id="menu-button" style="padding: 0">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a href="{{ url('/') }}" class="navbar-brand" style="padding-top: 3px"><span><i
              class="fa fa-building"></i>Night
            Star </span>HOTEL</a>
      </div><!-- end navbar-header -->

      <nav class="nav">
        <a class="nav-link text-dark font-bold recolor" style="font-size: large"
          href="{{ url('/') }}"><span>Trang
            chủ</span></a>
        <a class="nav-link text-dark font-bold recolor" style="font-size: large"
          href="{{ url('/rooms') }}"><span>Phòng</span></a>
        <a class="nav-link text-dark font-bold recolor" style="font-size: large"
          href="{{ url('/promotion') }}"><span>Khuyến mãi</span></a>
        <a class="nav-link text-dark font-bold recolor" style="font-size: large" href="#"><span>Tin
            tức</span></a>
        @if (!Auth::check())
          <a class="nav-link text-dark font-bold recolor" style="font-size: large" href="{{ url('/contact') }}">
            <span>Liên hệ</span>
          </a>
        @else
          <a class="nav-link text-dark font-bold recolor" style="font-size: large"
            href="{{ url('/contact/' . Auth::user()->id) }}">
            <span>Liên hệ</span>
          </a>
        @endif
        <a class="nav-link text-dark font-bold recolor" style="font-size: large" href="{{ url('/about') }}"><span>Về
            chúng tôi</span></a>
      </nav>
    </div><!-- end container -->
  </nav><!-- end navbar -->

  <div class="sidenav-content">
    <div id="mySidenav" class="sidenav">
      <h2 id="web-name"><span><i class="fa fa-building"></i></span>Night Star Hotel</h2>
      <div id="main-menu">
        <div class="closebtn">
          <button class="btn btn-default" id="closebtn">&times;</button>
        </div><!-- end close-btn -->
      </div><!-- end main-menu -->
    </div><!-- end mySidenav -->
  </div><!-- end sidenav-content -->
