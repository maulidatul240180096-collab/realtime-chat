<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        auth()->user()->update([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'bio' => $request->bio

        ]);

        return redirect()->route('profile.index');
    }
}