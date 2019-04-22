<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    public function idioma(){
        $this->belongsTo("App\Idioma");
    }

    public function mention(){
        $this->hasMany("App\Mention");
    }

    public function video(){
        $this->hasMany("App\Video");
    }

    public function videoUser(){
        $this->hasMany("App\Video_User");
    }

    public function videoList(){
        $this->hasMany("App\VideoList");
    }

    public function suscribe(){
        $this->hasMany("App\Suscribe");
    }
}
