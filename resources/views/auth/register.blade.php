@extends('layouts.app')

@section('content')
<div class="form">
	<h1 class="mid">{{ __('Rejestracja') }}</h1>
		
		<form method="POST" action="{{ route('register') }}">
			@csrf

			<div class ="entry">
				<label for="name" class ="fl2r">{{ __('Nazwa użytkownika') }}</label>
				
				<div class ="fr2l">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

					@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class ="entry">	
				<label for="email" class ="fl2r" >{{ __('Adres e-mail') }}</label>
				
				<div class ="fr2l">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class ="entry">
				<label for="password" class ="fl2r">{{ __('Hasło') }}</label>

				<div class ="fr2l">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

					@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class ="entry">
				<label for="password-confirm" class ="fl2r">{{ __('Powtórz hasło') }}</label>
					
				<div class ="fr2l">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
				</div>
			</div>

			<div class="mid">
				<button type="submit" class="btn btn-primary">
					{{ __('Register') }}
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
