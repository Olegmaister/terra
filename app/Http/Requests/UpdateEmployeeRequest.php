<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile_image' => 'file|mimes:jpeg,png,jpg,gif',
            'profession_id' => 'required|exists:professions,id',
            'description' => 'nullable|string'
        ];
    }
}
