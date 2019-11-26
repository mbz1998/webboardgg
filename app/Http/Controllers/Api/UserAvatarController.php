<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;

class UserAvatarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a new user avatar.
     *
     * @param \App\Handlers\ImageUploadHandler $uploader
     * @return \Illuminate\Http\Response
     */
    public function store(ImageUploadHandler $uploader)
    {
        $this->validate(request(), [
            'avatar' => ['required', 'image'],
        ]);

        auth()->user()->update([
            'avatar_path' => $uploader->save(request()->file('avatar'), 'avatars', 100),
        ]);

        return response([], 204);
    }
}
