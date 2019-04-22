<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video_VideoList extends Model
{
    //
    public function video(){
        $this->belongsTo("App\Video");
    }
    public function videoList(){
        $this->belongsTo("App\VideoList");
    }
}
