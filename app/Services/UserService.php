<?php

namespace App\Services;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function saveUser(StoreUserRequest $request): RedirectResponse
    {
        $this->userRepository->saveUser($request);
        return redirect()->route('login');
    }

    public function loginUser(LoginUserRequest $request): RedirectResponse
    {
        $userCredentials = $request->only('email', 'password');

        if (Auth::attempt($userCredentials)) {
            return redirect()->route('generate-token');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logoutUser(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function generateToken(): String
    {
        $user = Auth::user();
        $tokenResult = $user->createToken('authToken');
        return $tokenResult->plainTextToken;
    }
}
