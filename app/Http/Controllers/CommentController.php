<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request) {
        $post = Posts::find($request->post_id);
        $post->increment('comments');
        Comments::create(['user_id' => $request->user_id, 'post_id' => $request->post_id, 'content' => $request->content]);
        return redirect('/');
    }
}
