<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    // public function store(Request $request) {
    //     $post = Posts::find($request->post_id);
    //     $post->increment('comments');
    //     Comments::create(['user_id' => auth()->user()->id, 'post_id' => $request->post_id, 'content' => $request->content]);
    //     return redirect('/');
    // }

    public function store(Request $request) {

        $post = Posts::find($request->post_id);
        $post->increment('comments');

        $comment = new Comments();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->content = $request->content;
        $comment->image = $request->image;
        $comment->save();

        $comment->statistic = $post->comments;
        $commentOwner =  User::find(auth()->user()->id);
        $comment->commentOwner = $commentOwner;
        return response()->make(['success' => true, 'comment' => $comment]);
    }
    
}
