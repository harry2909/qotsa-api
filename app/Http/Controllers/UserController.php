<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function saveUser(StoreUserRequest $request): RedirectResponse
    {
        return $this->userService->saveUser($request);
    }

    public function loginUser(LoginUserRequest $request): RedirectResponse
    {
        return $this->userService->loginUser($request);
    }
    public function generateToken(): JsonResponse
    {
        return response()->json(['token' => $this->userService->generateToken()]);
    }
}
