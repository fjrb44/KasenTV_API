<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function user(){
        return $this->hasMany("App\Usuario");
    }
}
