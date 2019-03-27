@extends('layouts.app')

@section('content')
	<h3>Wyniki wyszukiwania:</h3>
	
	@foreach ($games as $game)
		<div class="game_div">
			<a href="/games/{{$game->id."-".$game->name}}">
			<img class="game_img" src='{{ $game->image_url }}' alt='Brak zdjęcia z gry.' />
			<p>{{ $game->name }}</p></a>
		</div>
	@endforeach
@endsection('content')
