<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    public $timestamps = false;
    
    public function user(){
        $this->belongsTo("App\Usuario");
    }
    
    public function video(){
        $this->belongsTo("App\Video");
    }
}
