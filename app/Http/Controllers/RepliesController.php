<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * Create a new RepliesController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Persist a new reply.
     *
     * @param  integer $channelId
     * @param  Thread  $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($channelId, Thread $thread)
    {
        $this->validate(request(), ['body' => 'required']);

        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back()->with('flash', 'Your reply has been left.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update an existing reply.
     *
     * @param Reply $reply
     */
    public function update(Reply $reply)
    {
        $this->authorize('update', $reply);

        $this->validate(request(), ['body' => 'required']);

        $reply->update(request(['body']));
    }

    /**
     * Delete the given reply.
     *
     * @param  Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();

        return back();
    }
}
