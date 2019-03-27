@extends('layouts.app')

@section('content')
<h1 align="center">Witaj na stronie GameSite!</h1>

<p align="justify">Strona jest poświęcona grom komputerowym.</p>
<ol>
	<?php
	use App\Game;
	$games = Game::orderBy('release_date', 'DESC')->paginate(20);
	?>
	@foreach ($games as $game)
		<div class="game_div">
			<a href="/games/{{$game->id."-".$game->name}}">
			<img class="game_img" src='{{ $game->image_url }}' alt='Brak zdjęcia z gry.' />
			<p>{{ $game->name }}</p></a>
		</div>
	@endforeach
</ol>
@endsection('content')