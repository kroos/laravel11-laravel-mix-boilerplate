<?php
use \Carbon\Carbon;

$currentYear = Carbon::now()->year;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<!-- <title>Laravel11 Boilerplate</title> -->
	<title>{{ config('app.name', 'Laravel') }}</title>

	<link href="{{ asset('images/logo.png') }}" type="image/x-icon" rel="icon" />

	<meta name="keywords" content="" />

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<!-- Styles -->
	<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
	<!-- Bootswatch Cerulean CSS -->
	<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
	<!-- Livewire CSS -->
	@livewireStyles

</head>
<body class="container-fluid d-flex flex-column min-vh-100 align-items-center justify-content-center bg-info-subtle">
	<div class="container-fluid">
		<!-- navigator -->
		<nav class="navbar navbar-expand-lg bg-primary rounded" data-bs-theme="dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">{!! config('app.name') !!}</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarColor01">
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							@auth
								<a class="nav-link active" href="{{ url('/dashboard') }}">Dashboard
									<span class="visually-hidden">(current)</span>
								</a>
							@else
								<a class="nav-link active" href="{{ url('/') }}">Home
									<span class="visually-hidden">(current)</span>
								</a>
							@endauth
						</li>

						@auth
							@include('layouts.navigation')
						@else
							<!-- nav for guest -->
						@endauth
					</ul>
					@if (Route::has('login'))
						@auth
							<div class="dropdown">
								<a href="{{ url('/dashboard') }}" class="btn btn-sm btn-outline-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->belongstouser->name }}</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="{{ route('profile.show', Auth::user()->belongstostaff->id) }}"><i class="fa-regular fa-user"></i> Profile</a>
									</li>
									<li>
										<!-- notification -->
										@include('layouts.notification')
									</li>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<li>
											<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-light fa-right-from-bracket"></i> Log Out</a>
										</li>
									</form>
								</ul>
							</div>

						@else
							<a class="btn btn-sm btn-secondary mx-1" href="{{ route('login') }}">Sign in</a>
						@endauth
					@endif
					@if (Route::has('register'))
						<a href="{{ route('register') }}" class="btn btn-sm btn-secondary mx-1">Sign up</a>
					@endif
					<!-- <form class="d-flex">
						<input class="form-control me-sm-2" type="search" placeholder="Search">
						<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
					</form> -->
				</div>
			</div>
		</nav>
		<!-- end navigation -->
		<!-- <div class="container-fluid "> -->
			@include('layouts.nojavascript')
			@include('layouts.sessionsuccess')
			@include('layouts.sessionerrors')
			@include('layouts.sessionalerts')

			@if(isset($errors))
				@include('layouts.error-messages')
			@endif
		<!-- </div> -->
		<div class="container align-items-center justify-content-center rounded">
			@yield('content')
		</div>
	</div>
	<!-- footer -->
	<div class="container-fluid d-flex align-items-center justify-content-center text-sm text-black mt-auto rounded">
		Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
	</div>
	<!-- footer end -->
</body>
<!-- <script type="module" src="{{ asset('js/fullcalendar/bootstrap5/index.global.js') }}"></script> -->
<!-- <script type="module" src="{{ asset('js/fullcalendar/daygrid/index.global.js') }}"></script> -->
<!-- <script type="module" src="{{ asset('js/fullcalendar/multimonth/index.global.js') }}"></script> -->
<script src="{{ asset('js/fullcalendar/index.global.js') }}"></script>
<!-- <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script> -->
<!-- <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script> -->
<script src="{{ asset('js/chartjs/chart.umd.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/ckeditor/adapters/jquery.js') }}"></script>
<script >
	jQuery.noConflict ();
	(function($){
		$(document).ready(function(){
			@section('js')
			@show
		});
	})(jQuery);
</script>
<script>
	@section('nonjquery')
	@show
</script>
@livewireScripts
</html>
