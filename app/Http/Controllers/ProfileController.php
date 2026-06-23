<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   public function update(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email'],
        'status' => ['nullable', 'string', 'max:255'],
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    $user = $request->user();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->status = $request->status;

    // upload foto
    if ($request->hasFile('photo')) {

        $photoPath = $request->file('photo')
                             ->store('profile', 'public');

        $user->photo = $photoPath;
    }

    $user->save();

    return Redirect::route('profile.edit')
        ->with('success', 'Profil berhasil diperbarui');
}
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
