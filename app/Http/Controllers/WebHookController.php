<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function getSickness(Request $request) {
        $json = $request->json()->all();
        $symptoms = $json['queryResult']['parameters']['symptom'];
        $response = array(
            "fulfillmentText" => json_encode($symptoms),
        );
        return json_encode($response);
    }
}
