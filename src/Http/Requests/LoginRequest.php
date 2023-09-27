<?php

namespace LaravelPassportAPIRoutes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'email', 'max:254'],
            'password' => ['required','min:6'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
