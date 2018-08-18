<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function getSickness(Request $request) {
        $response = array(
            "fulfillmentText" => 'Hello from webhook',
        );
        return json_encode($response);
    }
}
