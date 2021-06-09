<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {  
        //fetch the posts and pass the value to posts.index view

        // inside with method put relation tabled for eager loading
        $posts = Post::orderBy('created_at','desc')->with('user','likes')->paginate(20); // laravel collection
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

        // get the user info and create post
        // because we have create relationship between User and Post Model we don't need to think about foregin key
        $request->user()->posts()->create([
            'body'=>$request->body
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
       $this->authorize('delete',$post);
       $post->delete();
       return back();
    }

}
