<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Auth;

class FollowController extends Controller
{
    public function indexByUser($id){

    }

    public function follow(Request $request){

        // dd(Auth::user()->follow()->first() != null);

        $data = [
            'user_id'           => $request->user_id,
            'user_followed_id'  => $request->user_followed_id,
        ];

        Follow::firstOrCreate($data);

        return redirect()->route('article.show',['article' => $request->article_id]);
    }

}
