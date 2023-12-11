<?php

namespace Modules\Auth\app\Http\Strategies\Login;

use App\Http\Strategies\Strategy;
use Modules\Auth\app\Resources\V1\UserResource;
use Modules\Auth\app\Http\Strategies\Login\LoginWithEmailStrategy;
use Modules\Auth\app\Http\Strategies\Login\LoginWithPhoneStrategy;

class LoginStrategy extends Strategy
{
    public function __construct(
        private LoginWithEmailStrategy $loginWithEmailStrategy,
        private LoginWithPhoneStrategy $loginWithPhoneStrategy,
        private LoginWithNumberStrategy $loginWithNumberStrategy,
    ) {}

    private function data()
    {
        $user = request()->user();

        return [
            "token"  => $user->createToken('auth_token')->plainTextToken,
            "user"   => new UserResource($user)
        ];
    }

    public function loginWithEmail($email, $password){
        $this->loginWithEmailStrategy->login(
            $email,
            $password
        );

        return $this->data();
    }

    public function loginWithPhone($phone, $password){
        $this->loginWithPhoneStrategy->login(
            $phone,
            $password
        );

        return $this->data();
    }

    public function loginWithNumber($number, $password){
        $this->loginWithNumberStrategy->login(
            $number,
            $password
        );

        return $this->data();
    }

}
