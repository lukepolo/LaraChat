<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;

class MessagesController extends Controller
{
    // TODO - remove this into the protected $with
    const EAGER_LOADS = [
        'user'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Message::with(self::EAGER_LOADS)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        return response()->json(
            Message::create([
                'user_id' => auth()->id(),
                'message' => $request->get('message'),
            ])->load(self::EAGER_LOADS)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            Message::with(self::EAGER_LOADS)->findOrFail($id)
        );
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
        $message = Message::with(self::EAGER_LOADS)->findOrFail($id);

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
        return response()->json(
            Message::destroy($id)
        );
    }
}
