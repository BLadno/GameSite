@extends('layouts.app')

@section('content')
<div class="form">
    <h1 class="mid">{{ __('Login') }}</h1>
		<div class="card-body">
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<div class="entry">
					<label class ="fl2r" for="email">{{ __('Adres e-mail') }}</label>
					<div class="fr2l">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

						@if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="entry">
					<label for="password" class ="fl2r">{{ __('Hasło') }}</label>
					<div class="fr2l">
						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

						@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>
				
				<div class="entry">
					<div class="fl2r">
						<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<label for="remember">{{ __('Pamiętaj mnie') }} </label>
					</div>
				</div>
				
				<div class="entry">
					<div class="mid">
						<button type="submit" class="btn btn-primary">
							{{ __('Login') }}
						</button>
					</div>
				</div>
				<div class="entry">
					<div class="fr2r">
						@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
