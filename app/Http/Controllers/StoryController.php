<?php

namespace App\Http\Controllers;

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

    public function show() {
        return view('story.index');
    }

}
