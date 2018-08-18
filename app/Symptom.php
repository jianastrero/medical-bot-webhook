<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    public function sickness() {
        return $this->belongsTo('App\Sickness', 'sickness_id', 'id');
    }
}
