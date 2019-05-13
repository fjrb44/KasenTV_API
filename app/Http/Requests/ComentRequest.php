<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ComentRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        
        return [
            "text" => ["required", "min:5", "max:255"],
            "responseId" => ["numeric"]
        ];
    }
}