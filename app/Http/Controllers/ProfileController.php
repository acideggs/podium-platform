<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
	public function show(){
		$profile = [];
		if (auth()->user()->profile()->first() == null) {
			$profile = [
				'bio' => '',
				'instagram' => '', 
				'twitter' => '', 
				'photo' => ''
			];
		} else {
			$profile = auth()->user()->profile()->first();
		}
		return view('profile', compact('profile'));
	}

	public function showByUser(Profile $profile){
		// dd($profile);
		return view('showProfile', compact('profile'));
	}

	public function store(Request $request){
		$image_name = '';
		if ($request->photo != null) {
			$request->validate([
				'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			]);
			$image_name = auth()->user()->id . '_' . date("Ymd") . '.' . $request->photo->extension();
			$request->photo->move(public_path('img/profiles'), $image_name);
		}

		auth()->user()->profile()->create([
			'bio' => $request->bio,
			'instagram' => $request->instagram, 
			'twitter' => $request->twitter,
			'photo' => $image_name 
		]);
		return redirect()->route('profile.show')->with('success', 'Profile was created');
	}

	public function update(Request $request){
		$image_name = auth()->user()->profile()->first()->photo;
		if ($request->photo != null) {
			$request->validate([
				'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			]);
			\Storage::delete('img/profiles/' . $image_name);
			$image_name = auth()->user()->id . '_' . date("Ymd") . '.' . $request->photo->extension();
			$request->photo->move(public_path('img/profiles'), $image_name);
		}

		auth()->user()->profile()->update([
			'bio' => $request->bio,
			'instagram' => $request->instagram, 
			'twitter' => $request->twitter,
			'photo' => $image_name 
		]);
		return redirect()->route('profile.show')->with('success', 'Profile was updated');
	}


}
