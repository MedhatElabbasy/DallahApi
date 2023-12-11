<?php

namespace Modules\Auth\Repositories;

use App\Models\User;
use Modules\Auth\app\Models\PasswordResetToken;
use Modules\Auth\Repositories\Interfaces\PasswordResetTokenInterface;

class PasswordResetTokenRepository implements PasswordResetTokenInterface
{
    public function passwordResetVerification($email, $code)
    {
        PasswordResetToken::where("email", $email)->delete();

        PasswordResetToken::insert([
            'email' => $email,
            'token' => hash('sha512', $code),
            'created_at' => now()
        ]);
    }

    public function passwordReset($email, $code, $pass)
    {
        $password = PasswordResetToken::where("email", $email)
            ->where("token", hash('sha512', $code))
            ->first();
        if (!$password) return false;

        $password->delete();

        return User::where('email', $email)->first()->update([
            'password' => $pass
        ]);
    }

    public function passwordResetVerify($email, $code)
    {
        $password = PasswordResetToken::where("email", $email)
            ->where("token", hash('sha512', $code))
            ->first();
        if (!$password) return false;

        return true;
    }
}
