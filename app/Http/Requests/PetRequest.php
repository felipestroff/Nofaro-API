<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2',
            'specie_id' => 'required|integer'
        ];
    }
}
