<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function user(){
        $this->belongsTo("App\Usuario");
    }
    public function category(){
        $this->belongsTo("App\Category");
    }
    
    public function videoUser(){
        $this->hasMany("App\VideoUser");
    }
    
    public function videoVideoList(){
        $this->hasMany("App\VideoVideoList");
    }
    
    public function mention(){
        $this->hasMany("App\Mention");
    }
}
