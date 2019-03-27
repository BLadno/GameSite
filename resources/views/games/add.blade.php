@extends('layouts.app')

@section('content')
@guest
	<p>Warning! You are not allowed to see this page!</p>
@else
@if(Auth::user()->uprawnienia==2)
<div class="form">
    <h1 class="mid">{{ __('Dodaj grę') }}</h1>
		<div class="card-body">
			<form method="POST" action="{{ route('verifyGame') }}">
				@csrf
				<div class="entry">
					<div class="fl2r">
						<label for="name">{{ __('Nazwa gry') }}</label>
					</div>
					<div class="fr2l">
						<input type="text" " name="name" value="{{ old('name') }}" required>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="publisher">{{ __('Wydawca') }}</label>
					</div>
					<div class="fr2l">
						<input type="text" " name="publisher" value="{{ old('publisher') }}" required>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="image_url">{{ __('Adres obrazka') }}</label>
					</div>
					<div class="fr2l">
						<input type="text" " name="image_url" value="{{ old('image_url') }}">
					</div>
				</div>
				<div class="entry">
					<p class="fl2r">Gatunek gry:</p>
					<div class="fr2l">
						<select name="genre_id">
							@foreach($genres as $genre)
								<option value="{{$genre->id}}">{{$genre->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="release_date">{{ __('Data wydania') }}</label>
					</div>
					<div class="fr2l">
						<input type="date" " name="release_date" value="{{ old('release_date') }}" required>
					</div>
				</div>
				<div class="entry">
					<div class="fl2r">
						<label for="description">{{ __('Opis gry') }}</label>
					</div>
					<div class="fr2l">
						<textarea name="description" value="{{ old('description') }}" cols="40" rows="5" required></textarea>
					</div>
				</div>
				<div class="entry">
					<div class="mid">
						<button type="submit" class="btn btn-primary">
							{{ __('Dodaj grę') }}
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
