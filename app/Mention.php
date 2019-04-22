<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    //

    public function coment(){
        $this->belongsTo("App\Coment");
    }
    public function video(){
        $this->belongsTo("App\Video");
    }
    public function user(){
        $this->belongsTo("App\Usuario");
    }
}
