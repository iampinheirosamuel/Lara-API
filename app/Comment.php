<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Comment;
class Comment extends Model
{

	protected $fillable = [
        'title', 'body', 'password', 'post_id',
    ];

    //get a post that is attached to a comment

    public function post(){

    	return $this->belongsTo(Post::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    // Store new comment

    // public function addComment($body){

    // 	Comment::create([
                 
    //              'body' => $body,

    //               'post_id' => $post->id
    // 		]);
    // }


}
