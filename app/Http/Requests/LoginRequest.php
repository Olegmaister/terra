<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = [];

        if (!$this->has('email') || !$this->has('password')) {
            $errors['email'] = 'Email and password are required';
        } else {
            $errors['email'] = 'Invalid email or password';
        }

        throw new HttpResponseException(
            response()->json(['errors' => $errors], 422)
        );
    }
}
