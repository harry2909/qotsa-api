<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function saveUser(Request $request)
    {
        $user = new $this->model([
            'email' => $request->email,
            'password' => $this->hasher->make($request->password),
        ]);
        $user->save();
    }
}
