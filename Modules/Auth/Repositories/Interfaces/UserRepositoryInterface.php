<?php

namespace Modules\Auth\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function createUser($data);
    public function emailExists($email);
    public function phoneExists($phone);
}
