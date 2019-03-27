<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta http-equiv="Content-type" content="text/html; charset=windows-1250">
		<meta http-equiv="content-language" content="pl">
		<meta name="keywords" content="gry, gra, game, games">
		<meta name="description" content="GameSite - Strona o grach komputerowych">
		<meta name="robots" content="all"> 
		<meta name="revisit-after" content="30 days">
		<meta name="copyright" content="Bartłomiej Ładno">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'GameSite') }}</title>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		

		<!-- Styles -->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	</head>
	<body>
        @include ('layouts.nav')
        
        @include ('layouts.left-sidebar')

        @include ('layouts.right-sidebar')

        <div class="content">
			@if (session('status')) <!--Logged in -->
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
				You are logged in!
			@else <!--Not logged in -->
				
			@endif
            @yield ('content')
        </div>
        
        @include ('layouts.footer')
	</body>
</html>
