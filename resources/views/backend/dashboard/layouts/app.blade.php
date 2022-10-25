<!doctype html>
<html lang="{{ App::currentLocale() }}" class="h-100" @if( strtolower( __('index.direction') ) == 'rtl' ) direction="RTL"  @endif>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Sahaba Dashboard</title>

    <link rel="canonical" href="https://alsahaba.info/">
@if( strtolower( __('index.direction') ) == 'rtl' ) 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/dashboard/css/dashboard_rtl.css') }}" rel="stylesheet" />
@else
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/dashboard/css/dashboard.css') }}" rel="stylesheet" />
@endif

    <!-- Global Custom styles -->
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	
    <!-- Favicons
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">
 -->
 
 <style>
 .bg-darker-100 { background-color: #0001; }
 .bg-darker-200 { background-color: #0002; }
 .bg-darker-300 { background-color: #0003; }
 .bg-darker-400 { background-color: #0004; }
 </style>
    @yield('head')
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">{{ config('app.name') }}</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="@lang('backend.search')" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">@lang('backend.signout')</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @if( request()->route()->getName() =='home') active @endif" aria-current="page" href="{{ route('home') }}">
              <i class="fa fa-dashboard"></i>
              @lang('backend.sidebar_dashboard')
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if( substr(request()->route()->getName(), 0, 5) =='posts') active @endif" href="{{ route('posts.index') }}">
              <i class="fa fa-newspaper-o"></i>
              @lang('backend.sidebar_posts_browse')
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if( substr(request()->route()->getName(), 0, 5) =='users') active @endif" href="{{ route('users.index') }}">
              <i class="fa fa-users"></i>
              @lang('backend.sidebar_users_browse')
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if( substr(request()->route()->getName(), 0, 8) =='settings') active @endif" href="{{ route('settings.index') }}">
              <i class="fa fa-cogs"></i>
              @lang('backend.sidebar_settings')
            </a>
          </li>
		  {{--
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users" class="align-text-bottom"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Integrations
            </a>
          </li>
		  --}}
        </ul>
		{{--
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul>
		--}}
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex1 justify-content-between1 flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @yield('breadcrumb')
		{{--
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
		--}}
      </div>
	  
	  <div id="icontent">
	   @yield('content')
	  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
	  <!-- script src="dashboard.js"></script -->
	  @yield('script')
  </body>
</html>
