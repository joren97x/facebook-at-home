<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stories;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    //

    public function index() {
        return view('story.create');
    }

    public function create(Request $request) {

        Stories::create($request->all());
        return redirect('/');
    }    

    public function show(Request $request) {

        $story = Stories::find($request->id);
        $story->user = User::find($story->user_id);

        $stories = Stories::latest()->get();

        foreach($stories as $str) {

            $str->user = User::find($str->user_id);

        }

        return view('story.index', ['story' => $story, 'stories' => $stories]);
    }

}
