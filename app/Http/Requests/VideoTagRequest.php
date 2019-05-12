<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class VideoTagRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "videoId" => ["required", "numeric"],
            "tagId" => ["required", "numeric"]
        ];
    }
}