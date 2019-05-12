<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    public function response(){
        $this->hasMany("App\Coment", "id", "responseId");
    }
    public function mention(){
        $this->hasMany("App\Mention");
    }
    /*
    public function allResponses(){
        return $this->response()->with("allResponses");
    }
    */
}
