<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function like($post_id) {
        $post = Posts::find($post_id);
        $post->increment('likes');
        return redirect('/');
    }

    public function unlike($post_id) {
        $post = Posts::find($post_id);
        $post->decrement('likes');
        dd($post->likes);
    }
}
