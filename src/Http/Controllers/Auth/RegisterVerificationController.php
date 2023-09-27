<?php

namespace LaravelPassportAPIRoutes\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterVerificationController extends Controller
{
    public function verify($user_id, Request $request): JsonResponse
    {
        if (!$request->hasValidSignature()) {
            return response()->json(__('register.invalid_token'), Response::HTTP_BAD_GATEWAY);
        }
        $user = User::findOrFail($user_id);
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        return \response()->json(['message' => __('register.registration_successful')], Response::HTTP_OK);
    }

    public function resend(): JsonResponse
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(['message' => __('register.email_confirmed')], Response::HTTP_BAD_REQUEST);
        }

        auth()->user()->sendEmailVerificationNotification();

        return response()->json(['message' => __('register.confirmation_link_sent')], Response::HTTP_OK);
    }
}
