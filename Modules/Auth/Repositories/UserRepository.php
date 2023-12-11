<?php

namespace Modules\Auth\Repositories;

use Modules\Auth\app\Models\User;
use Modules\Auth\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($data)
    {
        return User::create($data);
    }

    public function emailExists($email)
    {
        return User::where('email', $email)->exists();
    }

    public function phoneExists($phone)
    {
        return User::where('phone', $phone)->exists();
    }
}
