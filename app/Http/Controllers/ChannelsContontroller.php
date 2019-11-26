<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ChannelsController extends Controller
{
    
    /*public function index()
    {
        $thread = DB::select('select * from theards where active = channel_id', [1]);
 
        return view('channel_id.index', ['channel_id' => $thread]);
    }

    public function showchannels ()
    {
            $thread = Thread::view([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect($thread->path())
            ->with('flash', 'Your thread has been published!');
    }
    public function show(Thread $thread)
    {
        return view('threads.show', [
            'thread' => $thread,
        ]);
    }*/
}


