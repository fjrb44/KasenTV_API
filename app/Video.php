<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    public function user(){
        $this->belongsTo("App\Usuario");
    }

    public function category(){
        $this->belongsTo("App\Category");
    }
    
    public function videoUser(){
        $this->hasMany("App\Video_User");
    }
    
    public function videoVideoList(){
        $this->hasMany("App\Video_VideoList");
    }
    
    public function mention(){
        $this->hasMany("App\Mention");
    }
}
