<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Likes;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function store(Request $request) {
        $user = User::create($request->all());
        auth()->login($user);
        return redirect('/');
    }

    public function authenticate(Request $request) {
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if( auth()->attempt($user)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        else {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
        
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/');
    }

    public function show($user_id) {
        $user = User::find($user_id);
        $posts = Posts::where('user_id', $user_id)->latest()->get();
        
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

        return view('users.show', ['user' => $user, 'posts' => $posts]);
    }

    public function updateProfilePic(Request $request) {
        $user = User::find(auth()->user()->id);
        $user->profile_pic = $request->profile_pic;
        $user->save();
        return back();
    }

    public function settings() {

        return view('users.settings');

    }
    
    public function login() {
        return view('users.login');
    }

    public function register() {
        return view('users.register');
    }

}
