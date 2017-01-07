<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Message::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $channel = auth()->user()->channels->find($request->get('channel_id'));

        if(!empty($channel)) {
            return response()->json(
                Message::create([
                    'user_id' => auth()->id(),
                    'message' => $request->get('messsage'),
                    'channel_id' => $channel->id
                ])
            );
        }

        return response()->json('The channel does not exist', 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Message::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MessageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, $id)
    {
        $message = Message::findOrFail($id);

        if($message->user_id == auth()->id) {

            $message->update([
                'message' => $request->get('message')
            ]);

            return response()->json($message);
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
        return response()->json(Message::destroy($id));
    }
}
