<div class="nav">
	<!-- Left Side Of Navbar -->
	<div class="nav-brand">
		<a href="/">GameSite</a>
	</div>

	<!-- Right Side Of Navbar -->
	<div class="nav-links">
		<!-- Authentication Links -->
		@guest
			<a href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
			@if (Route::has('register'))
				<a href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
			@endif
			
		@else
			<a href="{{ route('logout') }}"
			   onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
				{{ __('Wyloguj się') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
			<a href="/users/{{Auth::id()}}"> Zalogowany jako: {{ Auth::user()->name }} <span class="caret"></span> </a>
		@endguest
		<a href="/users">Użytkownicy</a>
		<a href="/games">Gry</a>
		<a href="/search">Wyszukaj</a>
		@auth
		@if(Auth::user()->uprawnienia==2)
			<a href="/games/add">Dodaj grę</a>
		@endif
		@endauth
	</div>
</div>