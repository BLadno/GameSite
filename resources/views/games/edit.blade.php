@extends('layouts.app')

@section('content')
@guest
	<p>Warning! You are not allowed to see this page!</p>
@else
@if(Auth::user()->uprawnienia==2)
<div class="form">
    <h1 class="mid">{{ __('Edytuj grę') }}</h1>
		<div class="card-body">
			<form method="POST" action="{{ route('modifyGame') }}">
				@csrf
				<input type="hidden" name="id" value="{{$game->id}}" required />
				<div class="entry">
					<div class="fl2r">
						<label for="name">{{ __('Nazwa gry') }}</label>
					</div>
					<div class="fr2l">
						<input type="text" name="name" value="{{ $game->name }}" required>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="publisher">{{ __('Wydawca') }}</label>
					</div>
					<div class="fr2l">
						<input type="text" name="publisher" value="{{ $game->publisher }}" required>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="image_url">{{ __('Adres obrazka') }}</label>
					</div>
					<div class="fr2l">
						<input type="text" name="image_url" value="{{ $game->image_url }}">
					</div>
				</div>
				<div class="entry">
					<p class="fl2r">Gatunek gry:</p>
					<div class="fr2l">
						<select name="genre_id">
							@foreach($genres as $genre)
								@if($game->genre_id==$genre->id)
									<option value="{{$genre->id}}" selected>{{$genre->name}}</option>
								@else
									<option value="{{$genre->id}}">{{$genre->name}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="release_date">{{ __('Data wydania') }}</label>
					</div>
					<div class="fr2l">
						<input type="date" name="release_date" value="{{$game->release_date}}" required>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="description">{{ __('Opis gry') }}</label>
					</div>
					<div class="fr2l">
						<textarea name="description" cols="40" rows="5" required>{{ $game->description }}</textarea>
					</div>
				</div>
				<div class="entry">
					<div class="mid">
						<button type="submit" class="btn btn-primary">
							{{ __('Zapisz grę') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@else
	<p>Warning! You do not have permission to see this page!</p>
@endif
@endguest
@endsection('content')
