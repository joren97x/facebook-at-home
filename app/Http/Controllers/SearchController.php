<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\User;
use App\Models\Likes;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request) {
        
        $result = new stdClass();

        $result->posts = Posts::where('post-content', 'LIKE', '%' . $request->search_input . '%')->get();
        $result->users = User::where('firstname', 'LIKE', '%' . $request->search_input. '%')->get();

        return response()->json(['response' => true, 'result' => $result]);

    }

    public function index(Request $request) {
        $result = new stdClass();

        $result->posts = Posts::where('post-content', 'LIKE', '%' . $request->search . '%')->get();
        $result->users = User::where('firstname', 'LIKE', '%' . $request->search. '%')->get();

        foreach($result->posts as $post) {
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
        return view('search/index', ['result' => $result]);
    }

}
