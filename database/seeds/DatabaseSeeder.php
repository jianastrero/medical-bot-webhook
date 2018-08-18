<?php

use App\Sickness;
use App\Symptom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sicknessStroke = new Sickness();
        $sicknessStroke->name = 'Stroke';
        $sicknessStroke->save();

        $sicknessHighBloodPressure = new Sickness();
        $sicknessHighBloodPressure->name = 'High Blood Pressure';
        $sicknessHighBloodPressure->save();

        $sicknessDiabetes = new Sickness();
        $sicknessDiabetes->name = 'Diabetes';
        $sicknessDiabetes->save();

        $strokeSymptoms = array(
            'numbness',
            'weakness',
            'confusion',
            'blurred vision',
            'trouble walking',
            'dizziness',
            'loss of balance or coordination'
        );

        $highBloodPressureSymptoms = array(
            'headache',
            'fatigue',
            'confusion',
            'vision problems',
            'chest pain',
            'difficulty breathing',
            'irregular hearthbeat',
            'blood in the urine',
            'irregular hearthbeat',
            'chest',
        );

        $diabetesSymptoms = array(
            'thirst',
            'hunger',
            'dry mouth',
            'urination',
            'unexplained weight loss',
            'fatigue',
            'blurred vision',
            'headache',
        );

        foreach ($strokeSymptoms as $symptom) {
            $item = new Symptom();
            $item->name = $symptom;
            $item->sickness_id = $sicknessStroke->id;
            $item->save();
        }

        foreach ($highBloodPressureSymptoms as $symptom) {
            $item = new Symptom();
            $item->name = $symptom;
            $item->sickness_id = $sicknessHighBloodPressure->id;
            $item->save();
        }

        foreach ($diabetesSymptoms as $symptom) {
            $item = new Symptom();
            $item->name = $symptom;
            $item->sickness_id = $sicknessDiabetes->id;
            $item->save();
        }
    }
}
