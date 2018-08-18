<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function getSickness(Request $request) {
        $symptoms = $request->queryResult;
        $response = array(
            "fulfillmentText" => 'Hello from webhook, your symptoms are: '.$symptoms,
        );
        return json_encode($response);
    }
}
