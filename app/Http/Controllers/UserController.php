<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function saveUser(StoreUserRequest $request): JsonResponse
    {
        return response()->json(['user' => $this->userService->saveUser($request)]);
    }

    public function generateToken(): JsonResponse
    {
        return response()->json(['token' => $this->userService->generateToken()]);
    }
}
