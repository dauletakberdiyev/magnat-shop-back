<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $dto = $request->getDto();

        if (Auth::attempt(['email' => $dto->email, 'password' => $dto->password])) {
            /** @var User $user */
            $user = Auth::user();

            return response()->json([
                'access_token' => $user->createToken('default')->plainTextToken,
                'data' => new LoginResource($user),
            ]);
        }

        return response()->json(['message' => 'Email или пароль введены некорректно'], 401);
    }
}
