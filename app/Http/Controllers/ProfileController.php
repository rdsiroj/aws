<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload ke S3
        $path = $request->file('photo')->store('profiles', 's3');
        $url = Storage::disk('s3')->url($path);

        return back()->with('success', 'Photo uploaded successfully!')->with('url', $url);
    }
}
