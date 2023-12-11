<?php

namespace Modules\Auth\Services;

use App\Http\Services\Service;
use Modules\Auth\app\Http\Strategies\ResetPassword\ResetPasswordWithEmailStrategy;

class ResetPasswordService extends Service
{
    public function __construct(
        private ResetPasswordWithEmailStrategy $resetPasswordWithEmailStrategy
    ) {}

    public function forgotWithEmail($email)
    {
        $this->resetPasswordWithEmailStrategy->forgot($email);
    }

    public function forgotVerifyWithEmail($email, $code)
    {
        $this->resetPasswordWithEmailStrategy->forgotVerify($email, $code);
    }

    public function resetWithEmail($email, $code, $password)
    {
        $this->resetPasswordWithEmailStrategy->reset($email, $code, $password);
    }
}


