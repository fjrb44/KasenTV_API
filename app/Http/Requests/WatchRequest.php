<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class WatchRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "userId" => ["required", "numeric"],
            "videoId" => ["required", "numeric"],
            "time" => ["numeric"]
        ];
    }
}