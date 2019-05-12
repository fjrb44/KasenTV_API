<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTag extends Model
{
    public function tag(){
        $this->belongsTo("App\Tag");
    }
    public function video(){
        $this->belongsTo("App\Video");
    }
}
