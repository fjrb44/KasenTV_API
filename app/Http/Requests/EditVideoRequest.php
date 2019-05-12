<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class EditVideoRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "description" => ["max:2000"],
            "imageUrl" => ["image", "mimes:jpg,jpeg,png,gif,webp"],
            "title" => ["required", "min:4", "max:100"],
            "categoryId" => ["numeric"]
        ];
    }
}