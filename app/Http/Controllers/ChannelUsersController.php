<?php

namespace App\Http\Controllers;

use App\Models\Channel;

class ChannelUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $channelId
     * @return \Illuminate\Http\Response
     */
    public function index($channelId)
    {
        return response()->json(Channel::findOrFail($channelId)->users);
    }
}
