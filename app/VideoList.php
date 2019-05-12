<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoList extends Model
{
    public function user(){
        $this->belongsTo("App\Usuario");
    }
    public function videoVideoList(){
        $this->hasMany("App\VideoVideoList");
    }
}
