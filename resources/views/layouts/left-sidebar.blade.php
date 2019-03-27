<div class="left-sidebar">
    <h3>Gatunki</h3>
    <div class="lista">
    	<list>
			<?php
				Use App\Genre;
				$genres = Genre::all();
			?>
			@foreach($genres as $genre)
    		<ul><a href="/games/genre/{{$genre->id."-".$genre->name}}">{{$genre->name}}</a></ul>
			@endforeach
    	</list>
    </div>
</div>