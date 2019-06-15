<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class NewVideoRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            /*
            "description" => ["max:2000"],
            "url" => ["required", "mimes:mp4,mov,ogg"],
            "imageUrl" => ["required", "image", "mimes:jpg,jpeg,png,gif,webp"],
            "title" => ["required","min:4", "max:100"],
            "userId" => ["required", "numeric"],
            "categoryId" =>["numeric"]
            */
        ];
    }
}