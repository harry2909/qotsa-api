<?php

namespace App\Services;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function saveUser(StoreUserRequest $request): bool|int
    {
        $user = $this->userRepository->saveUser($request);
        if (Auth::user()) {
            $this->logoutUser();
        }
        $this->loginUserWithId($user);
        if ($user) {
            return $user;
        }
        return false;
    }

    public function loginUserWithId(int $user): Authenticatable|bool
    {
        return Auth::loginUsingId($user);
    }

    public function loginUser(LoginUserRequest $request): bool
    {
        $credentials = $request->only('email', 'password');
        return Auth::attempt($credentials);
    }

    public function logoutUser(): void
    {
        Auth::logout();
    }

    public function generateToken(): bool|string
    {
        if (Auth::user()) {
            // Delete all existing tokens
            Auth::user()->tokens()->delete();

            // Create a new token
            $token = Auth::user()->createToken('authToken');
            return $token->plainTextToken;
        }
        return false;
    }
}
