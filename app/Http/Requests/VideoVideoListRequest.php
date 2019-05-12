<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class VideoVideoListRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "videoListId" => ["required", "numeric"],
            "videoId" => ["required", "numeric"]
        ];
    }
}