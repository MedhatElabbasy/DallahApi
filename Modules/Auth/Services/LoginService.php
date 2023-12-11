<?php

namespace Modules\Auth\Services;

use App\Http\Services\Service;
use Modules\Auth\app\Http\Strategies\Login\LoginStrategy;

class LoginService extends Service
{
    public function __construct(
        private LoginStrategy $loginStrategy,
    ) {}

    public function loginWithEmail($email, $password)
    {
        return $this->loginStrategy->loginWithEmail($email, $password);
    }

    public function loginWithPhone($phone, $password)
    {
        return $this->loginStrategy->loginWithPhone($phone, $password);
    }

    public function loginWithNumber($number, $password)
    {
        return $this->loginStrategy->loginWithNumber($number, $password);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
    }
}
