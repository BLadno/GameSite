<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;

use App\Genre;

use App\Comment;

use App\User;

class GameController extends Controller
{
	private function getGenre($id){
		$game = Game::where('id', $id)->firstOrFail();
		return $game->genre_id;
	}
	
	private function getGenreName($id){
		$genre = Genre::find($id)->name;
		return $genre;
	}
	
    public function index(){
		$games = Game::all();
    	return view('games.index',compact('games'));
    }
	
    public function getByGenre($id){
		$games = Game::where('genre_id', $id)->get();
		$genre = $this->getGenreName($id);
    	return view('games.list',compact('games','genre'));
    }
	
    public function show($id){
		$game = Game::where('id', $id)->firstOrFail();

		$genre = $this->getGenreName($this->getGenre($id));
		$game->genre = $genre;
		$comments = Comment::where('game_id', $id)->get();
		
		foreach($comments as $comment){
			$user = User::where('id', $comment->user_id)->firstOrFail();
			$comment->user = $user->name;
			$comment->created_at = date('d M Y H:i', strtotime($comment->created_at));
		}
		return view('games.show', compact('game'), compact('comments'));
    }
	
    public function add(){
		$genres = Genre::all();
    	return view('games.add', compact('genres'));
    }
	
	public function verifyGame(Request $request){
		$game = new Game();
		$game->name = $request->name;
		$game->description = $request->description;
		$game->publisher = $request->publisher;
		$game->image_url = $request->image_url;
		$game->genre_id = $request->genre_id;
		$game->release_date = $request->release_date;
		$game->created_at=now();
		$game->updated_at=now();
		$game->save();
    	//return $request->all();
		return $this->index();
	}
	
    public function editGame($id){
		$game = Game::where('id', $id)->firstOrFail();
		$genres = Genre::all();
    	return view('games.edit', compact('game','genres'));
    }
	
	public function displayPermission(Request $request){
		$user = User::find($request->user_id);
		$user->uprawnienia = $request->uprawnienia;
		$user->save();
    	//return $request->all();
		return $this->index();
	}
	
	public function modifyGame(Request $request){
		$game = Game::find($request->id);
		
		$game->name = $request->name;
		$game->description = $request->description;
		$game->publisher = $request->publisher;
		$game->image_url = $request->image_url;
		$game->genre_id = $request->genre_id;
		$game->release_date = $request->release_date;
		$game->updated_at=now();
		$game->save();
    	//return $request->all();
		return $this->index();
	}
}
