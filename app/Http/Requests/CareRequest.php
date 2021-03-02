<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'pet_id' => 'required|integer',
            'description' => 'nullable|string',
            'cared_at' => 'required|date'
        ];
    }
}
