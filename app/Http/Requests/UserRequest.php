<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "username" => ["required"],
            "email" => ["required"],
            "google_data" => ["required"],
            "languageId" => ["numeric"]
        ];
    }
}