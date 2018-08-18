<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sickness extends Model
{
    public function symptoms() {
        return $this->hasMany('App\Symptom', 'sickness_id', 'id');
    }
}
