<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;
use App\Comment;
use App\User;


class Post extends Model
{
    //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'password', 'post_id'
    ];
    
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function Comments(){

    	return $this->hasMany(Comment::class);
    }

    public function addComment ($body) {
         
         $this->comments()->create([
            'body' => $body,
            'post_id' => $this->id

        ]);

        // Comment::create([ 
        //       'body' => $body,
        //       
        // ]);

    }

}
