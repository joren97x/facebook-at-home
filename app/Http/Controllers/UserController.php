<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Likes;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function store(Request $request) {

        $form = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => ['required', 'confirmed']
        ]);
        $form['password'] = bcrypt($form['password']);
        $form['profile_pic'] = "default_profile_pic.png";
        $user = User::create($form);
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
            if($post->shared_from) {
                $post->sharedPost = Posts::find($post->shared_from);
                $post->sharedPostOwner = User::find($post->sharedPost['user_id']);
            }    
        }

        return view('users.show', ['user' => $user, 'posts' => $posts]);
    }

    public function updateAccount(Request $request) {

        $curr = $request->current_password;
        $old = auth()->user()->password;

        if (Hash::check($curr, $old)) {
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed']
            ]);

            $user = auth()->user();
            $user->update($request->only('firstname', 'lastname', 'email', 'password'));
            return back();
            
        }
        else {
            return back()->withErrors(['current_password' => 'Incorrect current passowrd']);
        }
        
    }
    

    public function updateProfilePic(Request $request) {
        $user = User::find(auth()->user()->id);
        $user->profile_pic = $request->profile_pic;
        $user->save();
        return back();
    }

    public function index() {
        $user = User::all();
        return $user;
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
