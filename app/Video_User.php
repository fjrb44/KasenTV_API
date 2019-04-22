<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video_User extends Model
{
    //
    public function user(){
        $this->belongsTo("App\Usuario");
    }
    
    public function video(){
        $this->belongsTo("App\Video");
    }
}
