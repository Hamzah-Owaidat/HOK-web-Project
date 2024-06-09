<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
{
    $user = User::findOrFail($userId);
    $scores = $user->scores()->with('game')->orderBy('date_played')->get(); // Eager load the associated game

    return view('profile', compact('user', 'scores'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        $user = Auth::user();
        $profileImageName = $user->profile_image ?? 'blank_profile.png';

        return view('edit-profile', compact('user', 'profileImageName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $userId)
{
    $request->validate([
        'username' => 'required|string|min:3|max:20',
        'bio' => 'required|string|max:150',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,avif|max:2048',
    ]);

    $user = User::findOrFail($userId);

    // Ensure the user is the same as the one whose profile is being updated
    if (Auth::id() != $userId) {
        return redirect()->route('edit.profile', ['userId' => $userId])->withErrors('You do not have permission to update this profile.');
    }

    $user->username = $request->username;
    $user->bio = $request->bio;

    // Check if profile image deletion is requested
    if ($request->has('delete_profile_image') && $request->delete_profile_image === 'true') {
        // Delete the old image if it exists and is not the default image
        if ($user->profile_image && $user->profile_image !== 'blank_profile.png') {
            $oldImagePath = public_path('images/profile-images/' . $user->profile_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        // Set profile image to default
        $user->profile_image = 'blank_profile.png';
    } elseif ($request->hasFile('profile_image')) {
        // Delete the old image if it exists and is not the default image
        if ($user->profile_image && $user->profile_image !== 'blank_profile.png') {
            $oldImagePath = public_path('images/profile-images/' . $user->profile_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Save the new image
        $image = $request->file('profile_image');
        $filename = $request->username . '-' . Auth::id() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile-images'), $filename);
        $user->profile_image = $filename;
    }

    // Save the user instance
    $user->save();

    return redirect()->route('profile', ['userId' => $userId])->with('success', 'Profile updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
