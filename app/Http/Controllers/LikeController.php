<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Posts;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store($post_id) {
        $post = Posts::find($post_id);
        $post->increment('likes');
        $like = new Likes();
        $like->user_id = auth()->user()->id;
        $like->post_id = $post_id;
        $like->save();
        return response()->json(['success' => true, 'likes' => $post->likes]);
    }

    public function show($post_id){
        $usersWhoLiked = Likes::where('post_id', $post_id)
        ->join('users', 'likes.user_id', '=', 'users.id')
        ->select('likes.*', 'users.firstname', 'users.lastname')
        ->get();
        
        return response()->json(['response' => true, 'usersWhoLiked' => $usersWhoLiked]);
    }

    public function destroy($post_id) {
        $post = Posts::find($post_id);
        $post->decrement('likes');
        Likes::where('user_id', auth()->user()->id)->where('post_id', $post_id)->delete();
        return response()->json(['success' => true, 'likes' => $post->likes]);
    }
}
