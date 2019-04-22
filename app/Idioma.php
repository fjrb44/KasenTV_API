<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    //
    public function user(){
        return $this->hasMany("App\Usuario");
    }
}
