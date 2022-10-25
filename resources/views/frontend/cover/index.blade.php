<!doctype html>
<html lang="{{ App::currentLocale() }}" class="h-100" @if( strtolower( __('index.direction') ) == 'rtl' ) direction="RTL"  @endif>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Cover Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://alsahaba.info/">
@if( strtolower( __('index.direction') ) == 'rtl' ) 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
@else
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endif

    <!-- Favicons -->
	<!--
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">
-->
	<!-- Icon fonts -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css" integrity="sha512-uvXdJud8WaOlQFjlz9B15Yy2Au/bMAvz79F7Xa6OakCl2jvQPdHD0hb3dEqZRdSwG4/sknePXlE7GiarwA/9Wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template -->
	<link href="{{ asset('frontend/cover/css/cover.css') }}" rel="stylesheet">
<style>
video {
  object-fit: cover;
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  z-index: -10000;
}
</style>
  </head>
  <body class="d-flex h-100 text-center text-bg-dark">
<video src="{{ asset('images/qudwatna_landing.mp4') }}" autoplay loop playsinline muted></video>

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto rounded bg-grey-300">
    <div>
      <div class="float-md-start mb-0"><a href="{{ url('/') }}"><img src="{{ asset('images/qudwatona.png') }}" height="64"></a></div>
		<ul class="nav justify-content-center float-md-end nav-masthead" @if( strtolower( __('index.direction') ) == 'rtl' ) dir="RTL"  @endif >
		  <li class="nav-item">
			<a class="nav-link active" href="#">@lang('frontend.navbar_home')</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">@lang('frontend.navbar_abountus')</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('frontend.navbar_sahaba_cards')</a>
			<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="#">@lang('frontend.navbar_ten_promised_paradise')</a></li>
				<li><a class="dropdown-item" href="#">@lang('frontend.navbar_most_hadeeth_narrators')</a></li>
				<li class="input-group px-2">
				<div class="form-floating">
				  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
				  <label for="floatingInput">@lang('frontend.navbar_find_sahabi')</label>
				</div>
				<button class="btn btn-outline-info"><i class="bi bi-zoom-in"></i></button>
				</li>
				<li><a class="dropdown-item" href="#">@lang('frontend.navbar_ten_promised_paradise')</a></li>
			</ul>
		  </li>
		  <li class="nav-item">
			<a class="nav-link">@lang('frontend.navbar_sahaba_interducing')</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link">@lang('frontend.navbar_contactus')</a>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Languages">
			  <i class="bi bi-globe"></i>
		    </a>
			<ul class="dropdown-menu">
			@foreach(getLanguagesList() as $iso2=>$title)
				<li><a class="dropdown-item" href="{{ route('language', $iso2) }}"><span class="fi fi-{{ substr($title, -2) }}"></span> {{ substr($title,0, strlen($title) -3) }}</a></li>
			@endforeach
			</ul>
		  </li>
		  
		</ul>
	  
    </div>
  </header>

  <main class="px-3">
    <h1>Alsahab INFO</h1>
    <p class="lead">Just text</p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
    </p>
  </main>

  <footer class="mt-auto text-white-50">
    <p>Copyright &copy; Alsahaba Qudwatona 2022 </p>
	<p><a href="https://facebook.com/" class="text-white"><i class="bi bi-facebook"></i></a> <a href="https://twitter.com/" class="text-white"><i class="bi bi-twitter"></i></a> <a href="@" class="text-white"><i class="bi bi-telegram"></i></a> <a href="@" class="text-white"><i class="bi bi-whatsapp"></i></a> <a href="@" class="text-white"><i class="bi bi-instagram"></i></a></p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
  </body>
</html>
