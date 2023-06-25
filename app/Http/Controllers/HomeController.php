<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Likes;
use App\Models\Posts;
use App\Models\Stories;
use App\Models\Comments;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $posts = Posts::latest()->get();
        $stories = Stories::latest()->get();

        foreach($stories as $story) {
            $story->user = User::find($story->user_id);
        }

        foreach($posts as $post) {
            $post->user = User::find($post->user_id);
            $post->comment = Comments::where('post_id', $post->id)->get();

            foreach($post->comment as $comment) {
                $commentOwner =  User::find($comment->user_id);
                $comment->commentOwner = $commentOwner;
            }

            $post->isLiked = Likes::where('user_id', auth()->user()->id)
                ->where('post_id', $post->id)->exists();
            if($post->shared_from) {
                $post->sharedPost = Posts::find($post->shared_from);
                $post->sharedPostOwner = User::find($post->sharedPost['user_id']);
            }
        }

        return view('index', compact('posts', 'users', 'stories'));
    }
}
