<!DOCTYPE html>


@extends('layouts.app')

@section('content')
	<div class ="form">
		<h1 class="mid">Użytkownik</h1>
		<div class ="entry">
			<p class ="fl2r"> Nazwa użytkownika: </p> <p class ="fr2l"> {{ $user->name}} </p>
		</div>
		<div class ="entry">
			<p class ="fl2r"> Uprawnienia: </p>
			<p class ="fr2l"> {{ $user->uprawnienia_name }} </p>
		</div>
	@auth
		@if(Auth::user()->name == $user->name)
			<div class ="entry">
				<p class ="fl2r"> Email: </p>
				<p class ="fr2l"> {{ $user->email }} </p>
			</div>
		</div>
		<div class ="form">
			<form method="POST" action="{{ route('changePassword')}}">
				@csrf
				<h1 class="mid">Zmień hasło</h1>
				<div class ="entry">
					<p class ="fl2r"> Stare hasło: </p>
					<div class ="fr2l">
						<input id="current-password" type="password" class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" required>
					</div>
				</div>
				<div class ="entry">
					<p class ="fl2r"> Hasło: </p>
					<div class ="fr2l">
						<input id="new-password" type="password" class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}" name="new-password" required>
					</div>
				</div>
				<div class ="entry">
					<label for="password-confirm" class ="fl2r">{{ __('Powtórz hasło') }}</label>
						
					<div class ="fr2l">
						<input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
					</div>
				</div>

				<div class ="entry">
					<div class="mid">
						<button type="submit" class="btn btn-primary">
							{{ __('Zmień hasło') }}
						</button>
					</div>
				</div>
				@if($errors->any())
					<strong>{{$errors->first()}}</strong>
				@endif
			</div>
		</form>
		@else
		@if(Auth::user()->uprawnienia==3)
		</div>
			<div class ="form">
				<form method="POST" action="{{ route('uprawnienia',['user_id'=>$user]) }}">
					@csrf
					<h1 class="mid">Nadaj uprawnienia</h1>
					<div class ="entry">
						<p class="fl2r">Uprawnienie</p>
						<div class="fr2l">
							<select name="uprawnienia">
								@foreach($permissions as $permission)
									@if($user->uprawnienia==$permission->id)
										<option value="{{$permission->id}}" selected>{{$permission->name}}</option>
									@else
										<option value="{{$permission->id}}">{{$permission->name}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class ="entry">
						<div class="mid">
							<button type="submit" class="btn btn-primary">
								{{ __('Ustaw uprawnienia') }}
							</button>
						</div>
					</div>
				</form>
				@if($errors->any())
					<strong>{{$errors->first()}}</strong>
				@endif
				@endif
			@endif
	@endauth
	</div>
@endsection('content')