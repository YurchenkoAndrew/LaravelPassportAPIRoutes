<?php

namespace LaravelPassportAPIRoutes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'token' => 'required',
            'email' => ['required', 'email', 'max:254'],
            'password' => 'required|string|confirmed|min:6',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
