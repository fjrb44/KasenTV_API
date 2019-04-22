<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function video(){
        $this->hasMany("App\Video_Tag");
    }
}
