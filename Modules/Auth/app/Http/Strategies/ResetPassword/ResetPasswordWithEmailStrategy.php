<?php

namespace Modules\Auth\app\Http\Strategies\ResetPassword;

use App\Http\Strategies\Strategy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Repositories\UserRepository;
use Modules\Auth\app\Emails\ResetPasswordMail;
use Modules\Auth\Repositories\PasswordResetTokenRepository;

class ResetPasswordWithEmailStrategy extends Strategy
{
    public function __construct(
        private UserRepository $userRepository,
        private PasswordResetTokenRepository $passwordResetTokenRepository,
    ) {}

    public function forgot($email)
    {
        if (!$this->userRepository->emailExists($email))
            return $this->respondError(__('Email is not exists'))->throwResponse();

        $verificationCode = rand(1000, 9999);

        $this->passwordResetTokenRepository->passwordResetVerification(
            $email,
            $verificationCode
        );

        try {
            Mail::to($email)->send(new ResetPasswordMail($verificationCode));
        } catch (\Exception $e) {
            return $this->respondError(__('Sorry, try again later!'))->throwResponse();
        }
    }

    public function forgotVerify($email, $code)
    {
        $reset = $this->passwordResetTokenRepository->passwordResetVerify(
            $email,
            $code
        );

        if (!$reset) return $this->respondError(__('The code is not valid'))->throwResponse();
    }

    public function reset($email, $code, $password)
    {
        $reset = $this->passwordResetTokenRepository->passwordReset(
            $email,
            $code,
            $password
        );

        if (!$reset) return $this->respondError(__('The code is not valid'))->throwResponse();
    }
}
