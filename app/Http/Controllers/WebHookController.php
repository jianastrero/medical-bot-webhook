<?php

namespace App\Http\Controllers;

use App\Sickness;
use App\Symptom;
use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function getSickness(Request $request) {
        $json = $request->json()->all();
        $symptoms = $json['queryResult']['parameters']['symptom'];
        $possibleSickness = array();
        foreach ($symptoms as $symptom) {
            $items = Symptom::where('name', $symptom)->get();
            foreach ($items as $item) {
                $sickness = 'Unknown';
                if ($item instanceof Symptom) {
                    $sickness = $item->sickness->name;
                }
                $possibleSickness[] = $sickness;
            }
        }
        $response = array(
            "fulfillmentText" => json_encode($possibleSickness),
        );
        return json_encode($response);
    }
}
