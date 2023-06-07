<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Likes;

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

            $post->isLiked = Likes::where('user_id', auth()->user()->id)
                ->where('post_id', $post->id)->exists();

        }
        return view('index', ['posts' => $posts]);
    }

    public function destroy(Request $request) {
        $post = Posts::findOrFail($request->post_id);
        $post->delete();
        return response()->make(['success' => true]);

    }

    public function update(Request $request) {
        $post = Posts::findOrFail($request->post_id);
        $post->update($request->only('post-content', 'post-img'));
        return back();
    }

    public function show($user_id) {

        $posts = Posts::where('user_id', $user_id)->get();
        return view('users.show', ['posts' => $posts]);

    }

}
