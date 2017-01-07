<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Entry Point into the APP
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function app()
    {
        return view('spa', [
            'user' => \Auth::user(),
        ]);
    }
}
