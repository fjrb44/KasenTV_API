<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "name" => ["required"]
        ];
    }
}