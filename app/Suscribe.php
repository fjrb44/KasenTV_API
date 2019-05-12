<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscribe extends Model
{
    public function suscribe(){
        $this->belongsTo("App\Suscribe", "suscriberId");
    }
    public function influencer(){
        $this->belongsTo("App\Suscribe", "influencerId");
    }
}
