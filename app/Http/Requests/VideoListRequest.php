<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class VideoListRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "name" => ["required"],
            "userId" => ["required", "numeric"]
        ];
    }
}