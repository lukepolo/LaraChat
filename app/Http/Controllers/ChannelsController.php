<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChannelRequest;
use App\Models\Channel;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Channel::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChannelRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelRequest $request)
    {
        return response()->json(Channel::create([
            'user_id' => auth()->id(),
            'name' => $request->get('name')
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Channel::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChannelRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChannelRequest $request, $id)
    {
        $channel = Channel::findOrFail($id);

        if($channel->user_id == auth()->id()) {
            $channel->update([
                'name' => $request->get('name')
            ]);

            return response()->json($channel);
        }

        return response()->json('Unauthorized', 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(Channel::destroy($id));
    }
}
