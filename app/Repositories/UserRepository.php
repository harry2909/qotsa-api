<?php

namespace App\Repositories;

use App\Http\Requests\StoreUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class UserRepository implements UserRepositoryInterface
{
    private User $model;
    private HasherContract $hasher;

    public function __construct(User $user, HasherContract $hasher)
    {
        $this->model = $user;
        $this->hasher = $hasher;
    }

    public function saveUser(StoreUserRequest $request)
    {
        $user = new $this->model([
            'email' => $request->email,
            'name' => $request->email,
            'password' => $this->hasher->make($request->password),
        ]);
        $user->save();
    }
}
