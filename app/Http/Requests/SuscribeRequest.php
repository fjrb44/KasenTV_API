<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SuscribeRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        return [
            "suscriberId" => ["required", "numeric"],
            "influencerId" => ["required", "numeric"]
        ];
    }
}