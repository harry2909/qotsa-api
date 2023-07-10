<?php
namespace App\Interfaces;

use App\Http\Requests\StoreUserRequest;

interface UserRepositoryInterface
{
    public function saveUser(StoreUserRequest $request);
}
