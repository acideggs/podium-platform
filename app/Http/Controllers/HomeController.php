<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = Tag::all();
        return view('welcome', ['tags' => $tags]);
    }

}
