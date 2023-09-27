<?php

namespace LaravelPassportAPIRoutes\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use LaravelPassportAPIRoutes\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $registerRequest): JsonResponse
    {
        $user = new User([
            'name' => $registerRequest->input('name'),
            'email' => $registerRequest->input('email'),
            'password' => Hash::make($registerRequest->input('password')),
        ]);
        $user->save();
        event(new Registered($user));
        return response()->json(['message' => __('register.check_your_email')]);
    }
}
