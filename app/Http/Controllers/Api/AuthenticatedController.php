<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    /**
     * API authentication request.
     */
    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        $user->tokens()->delete();

        $token = $user->createToken(config('app.sanctum_key'))->plainTextToken;

        $user = new UserResource($user);

        $data = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($data);
    }
}
