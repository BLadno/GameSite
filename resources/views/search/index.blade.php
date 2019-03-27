@extends('layouts.app')

@section('content')
<div class="form">
	<h1 class="mid">Wyszukaj grę</h1>
	
	<form method="POST" action="/search/show">
		@csrf
		<div class="entry">
			<div class="fl2r">
				<label for="name">{{ __('Nazwa gry') }}</label>
			</div>
			<div class="fr2l">
				<input type="text" name="name" value="" required>
			</div>
		</div>
		<div class="entry">
			<div class="mid">
				<button type="submit" class="btn btn-primary">
					{{ __('Wyszukaj grę') }}
				</button>
			</div>
		</div>
	</form>
</div>
@endsection('content')
