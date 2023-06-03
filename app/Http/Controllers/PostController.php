<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function store(Request $request) {
        Posts::create($request->all());
        return redirect('/');
    }

    public function index() {

        $posts = Posts::latest()->get();

        foreach($posts as $post) {
            $post->user = User::find($post->user_id);
            $post->comment = Comments::where('post_id', $post->id)->get();

            foreach($post->comment as $comment) {
                $commentOwner =  User::find($comment->user_id);
                $comment->commentOwner = $commentOwner;
            }

        }
        return view('index', ['posts' => $posts]);
    }

    public function show($user_id) {

        $posts = Posts::where('user_id', $user_id)->get();
        return view('users.show', ['posts' => $posts]);

    }

}
