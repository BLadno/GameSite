<!DOCTYPE html>


@extends('layouts.app')

@section('content')


<div class ="form">
	<h1 class="mid">{{ $game->name}}</h1>
	@auth
		@if(Auth::user()->uprawnienia==2)
			<div class="entry">
				<a href="edit/{{ $game->id.'-'.$game->name}}" class="fr2r">Edytuj</a>
			</div>
		@endif
	@endauth
	<div class="entry">
		<div class="game_left">
			<div class="entry">
				<p class = "fl2l"> Gatunek:  {{ $game->genre}} </p>
			</div>
			<div class="entry">
				<p class = "fl2l"> Wydawca:  {{ $game->publisher}} </p>
			</div>
			<div class="entry">
				<p class = "fl2l"> Data wydania: {{ $game->release_date}} </p>
			</div>
		</div>
		<div class="game_right">
			<img class="game_img" src='{{ $game->image_url }}' alt='Brak zdjęcia z gry.' />
		</div>
	</div>
	<div class="entry">
		<div class="game_mid">
			<h2 class="mid">Opis gry:</h2>
			<p class = "justify">{!! $game->description !!} </p>
		</div>
	</div>
</div>

<div class="form">
	<h1 class="mid">Komentarze</h1>
	@if(count($comments)==0)
		<div class="entry">
			<h2 class="mid">Brak komentarzy</h2>
		</div>
	@endif
	@foreach($comments as $comment)
		<div class="entry">
			<h4 class="fr2r">{{$comment->created_at}} 	
			@auth
				@if(Auth::user()->uprawnienia==2 || Auth::user()->id==$comment->user_id)
					<form method="POST" action="{{ route('delComment') }}">
					@csrf
					<input type="hidden" name="comment_id" value="{{$comment->id}}" required />
					<input type="hidden" name="user" value="{{$comment->user}}" required />
					<input type="hidden" name="date" value="{{$comment->created_at}}" required />
						<div class="entry">
							<button type="submit" class="btn btn-primary">
								{{ __('Usuń') }}
							</button>
						</div>
					</form>
				@endif
			@endauth
		</h4>
			<h3 class="fl2l"><a href="/users/{{$comment->user_id."-".$comment->user}}">{{ $comment->user }}</a></h3>
		</div>
		<div class="entry">
			<p class = "comment_mid">{{ $comment->comment}} </p>
		</div>
	@endforeach
	@guest
		<div class="entry">
			<h2 class="mid"> Zaloguj się aby komentować.</h2>
		</div>
	@else
		<h1 class="mid">{{ __('Napisz komentarz') }}</h1>
	
		<div class="card-body">
			<form method="POST" action="{{ route('addComment') }}">
				<input type="hidden" name="game_id" value="{{$game->id}}" required />
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}" required />
				@csrf
				<div class="entry">
					<div class="fl2r">
						<label for="comment">{{ __('Treść komentarza') }}</label>
					</div>
					<div class="fr2l">
						<textarea name="comment" value="{{ old('description') }}" cols="40" rows="5" required></textarea>
					</div>
				</div>
				<div class="entry">
					<div class="mid">
						<button type="submit" class="btn btn-primary">
							{{ __('Dodaj komentarz') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	@endguest
	@if($errors->any())
		<strong>{{$errors->first()}}</strong>
	@endif
</div>


@endsection('content')