<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show', [
            'profileUser' => $user,
            'threads' => $user->threads()->paginate(10),
        ]);
    }
}
