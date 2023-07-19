<?php
namespace App\Interfaces;

use App\Http\Requests\StoreUserRequest;

interface UserServiceInterface
{
    public function saveUser(StoreUserRequest $request);
    public function loginUser(int $user);
    public function logoutUser();
}
