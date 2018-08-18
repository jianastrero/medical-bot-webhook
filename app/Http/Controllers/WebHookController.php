<?php

namespace App\Http\Controllers;

use App\Sickness;
use App\Symptom;
use function count;
use Illuminate\Http\Request;
use function value;

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
        $sicknessScores = array();
        foreach ($possibleSickness as $item) {
            if (array_key_exists($item, $possibleSickness)) {
                $sicknessScores[$item] = 1;
            } else {
                $sicknessScores[$item] = $sicknessScores[$item] + 1;
            }
        }
        $fulfillmentText = "You are healthy. Your symptoms are probably just coincidence, or Something i may not know of.";
        $possibleSickness = array_unique($possibleSickness);
        if (count($possibleSickness) == 1) {
            $fulfillmentText = "You have $possibleSickness[0]";
        } else if ($possibleSickness > 1) {
            $fulfillmentText = "You most likely have $possibleSickness[0], but you are in risk of having ";
            if (count($possibleSickness)-1 > 1) {
                $i = 0;
                for (; $i < count($possibleSickness)-2; $i++) {
                        $fulfillmentText .= $possibleSickness[$i].', ';
                }
                $fulfillmentText .= 'and '.$possibleSickness[$i];
            } else {
                $fulfillmentText .= $possibleSickness[1];
            }
            $fulfillmentText .= 'too';
        }
        $response = array(
            "fulfillmentText" => $fulfillmentText,
        );
        return json_encode($response);
    }

    private function isInArray($array, $value) {
        foreach ($array as $item) {
            if ($item == $value) return true;
        }
        return false;
    }
}
