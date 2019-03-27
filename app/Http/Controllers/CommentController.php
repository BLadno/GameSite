<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
	public function add(Request $request){
		$comment = new Comment();
		$comment->comment = $request->comment;
		$comment->user_id = $request->user_id;
		$comment->game_id = $request->game_id;
		$comment->created_at=now();
		$comment->updated_at=now();
		$comment->save();
		
    	//return $request->all();
		return redirect()->back()->withErrors(["success"=>"Komentarz został dodany pomyślnie!"]);
	}
	public function del(Request $request){
		$comment = Comment::where('id',$request->comment_id);
		$comment->delete();
    	//return $request->all();
		return redirect()->back()->withErrors(["success"=>"Komentarz użytkownika {$request->user} z dnia {$request->date} został usunięty."]);
	}
}
