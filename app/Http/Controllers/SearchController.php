<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;

use Page;

class SearchController extends Controller
{
    public function index(){
    	return view('search.index');
    }
    public function show(Request $request){
		
		//$games = Game::where('name', $request->name)->get();
		$games = Game::where('name', 'LIKE', "%{$request->name}%")->get();
		//return view('search.index');
		//return $games;
    	return view('search.show',compact('games'));
    }
}
