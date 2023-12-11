<?php

namespace Modules\Auth\Services;

use Modules\Auth\app\Http\Strategies\Register\RegisterStrategy;
use Modules\Auth\app\Http\Strategies\ResetPassword\ResetPasswordWithEmailStrategy;

class RegisterService
{
    public function __construct(
        private ResetPasswordWithEmailStrategy $registerStrategy,
    ) {}

    public function registerWithEmail(array $data)
    {
        return $this->registerStrategy->registerWithEmail($data);
    }
}
