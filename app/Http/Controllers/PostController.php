<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

class PostController extends Controller
{
	public function index(){

		$posts = Post::all();

		return view('posts.index',compact('posts'));
	}

	public function show($id){

		$post = Post::find($id);

		return view('posts.show', compact('post'));
	}

	public function create(){

		return view('posts.create');
	}
    //

    public function store(Request $request)
    {
        //Create a new post using the request data
        // $post = new Post;

        // $post->title = request('title');
        // $post->body = request('body');

        // // Save it
        // $post->save();

        // Post::create([
        //      'title' => request('title'),
        //      'body' => request('body')

        // ]);

        Post::create(request(['title', 'body']));


        return redirect('/blog');
    }
}
