@extends('layouts.app')

@section('content')
<h3>Lista użytkowników:</h3>
<ol>
	@foreach ($users as $user)
	<li> <a href="/users/{{$user->id."-".$user->name}}">{{ $user->name }}</a>
	</li> 
	@endforeach
</ol>
@endsection('content')
