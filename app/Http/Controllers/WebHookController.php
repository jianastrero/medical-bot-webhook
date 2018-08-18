<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function getSickness(Request $request) {
        $symptoms = $request->queryResult->symptom;
        $response = array(
            "fulfillmentText" => 'Hello from webhook, your symptoms are: '.json_decode($symptoms),
        );
        return json_encode($response);
    }
}
