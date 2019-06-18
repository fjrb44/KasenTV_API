<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "description" => ["max:2000"],
            "imageUrl" => ["image", "mimes:jpg,jpeg,png,gif,webp"],
            "title" => ["min:4", "max:100"],
            "categoryId" =>["numeric"]
        ];
    }
}
