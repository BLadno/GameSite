<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;
	public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment','updated_at',
    ];
	
	public function genComment(){
		$comments = [
		"Fajna gra!",
		"Kiepska gra!",
		"Słaba gra!",
		"Fajnie mi się w nią grało, polecam.",
		"Taka sobie",
		"Grałem w lepsze",
		"Niezła gierka",
		];
		$i = rand(1,count($comments));
		return $comments[$i-1];
	}
}
