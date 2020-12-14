@extends('layouts.login')
@section('title','Login')
@section('content')
<link rel="apple-touch-icon" href="https://gfx4arab.com/wp-content/uploads/2018/12/blue-company-logo_1057-513.jpg">
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar  pace-done" data-open="click" data-menu="vertical-menu" data-col="1-column"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="logo" src="https://static.rfstat.com/renderforest/images/v2/logo-homepage/gradient_2.png">
              <h3 class="brand-text">Outlet Admin</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      
    </div>
  </nav>

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img height ="100px" src="https://static.rfstat.com/renderforest/images/v2/logo-homepage/gradient_2.png" alt="logo">
                  </div>
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login Information</span>
                  </p>
                </div>
                <div class="card-content">
                  @include('admin.includes.alerts.errors') 
                  @include('admin.includes.alerts.success')
                  <div class="card-body pt-0">
                    <form class="form-horizontal"  action="{{route('admin.login')}}" method="post">
                      @csrf
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="email" class="form-control" id="user-email" placeholder="Enter Email">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" class="form-control" id="user-password" placeholder="Enter Password"
                        >
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </fieldset>

                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                          <fieldset>
                            <input type="checkbox" name = "remember_me" id="remember-me" class="chk-remember">
                            <label for="remember-me">Remember me</label>
                          </fieldset>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-dark btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright © 2020 OUTLET , All rights reserved. </span>
      
    </p>
  </footer>


</body>
@endsection
