<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function getSickness(Request $request) {
        $response = array(
            "source" => $request->result->source,
            "speech" => "Hello from webhook speech",
            "displayText" => "Hello from webhook display text",
            "contextOut" => array()
        );
        return json_encode($response);
    }
}
