<?php
namespace App\Interfaces;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

interface UserServiceInterface
{
    public function saveUser(StoreUserRequest $request);
    public function loginUser(LoginUserRequest $request);
    public function logoutUser();
}
