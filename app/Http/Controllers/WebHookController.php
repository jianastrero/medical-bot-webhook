<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function getSickness(Request $request) {
        return json_encode($request->toArray());
    }
}
