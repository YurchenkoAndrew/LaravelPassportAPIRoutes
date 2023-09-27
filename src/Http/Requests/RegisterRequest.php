<?php

namespace LaravelPassportAPIRoutes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users|max:255",
            "password" => "required|string|min:6"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
