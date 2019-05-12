<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoVideoList extends Model
{
    public function video(){
        $this->belongsTo("App\Video");
    }
    public function videoList(){
        $this->belongsTo("App\VideoList");
    }
}
