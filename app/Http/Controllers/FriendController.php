<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    //

    public function store(Request $request) {

        Friend::create($request->all());
        return response()->json(['response' => $request->all()]);

    }

    public function destroy(Request $request) {

        Friend::where(['user_id' => $request->user_id, 'friend_id' => $request->friend_id])->delete();
        return response('bruh moment');

    }

    public function update(Request $request) {

        Friend::where(['user_id' => $request->user_id, 'friend_id' => $request->friend_id])
        ->update(['status' => 'accepted']);
        return response('done');

    }



}
