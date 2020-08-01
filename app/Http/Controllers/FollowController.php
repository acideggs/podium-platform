<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Auth;

class FollowController extends Controller
{
    public function following(){
        $following = auth()->user()->follow()->get();
        return view('following', compact('following'));
    }

    public function follower(){
        $follower = auth()->user()->follower()->get();
        return view('follower', compact('follower'));
    }

    public function follow(Request $request){
        $data = [
            'user_id'           => $request->user_id,
            'user_followed_id'  => $request->user_followed_id,
        ];

        Follow::firstOrCreate($data);

        return redirect()->route('article.show',['article' => $request->article_id]);
    }

}
