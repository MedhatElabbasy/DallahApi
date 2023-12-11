<?php

namespace Modules\Auth\app\Http\Strategies\Login;

use App\Http\Strategies\Strategy;
use Illuminate\Support\Facades\Auth;

class LoginWithEmailStrategy extends Strategy
{

    public function login($email, $password)
    {
        if(!Auth::attempt(['email'=>$email, 'password'=>$password]))
            return $this->respondError(__('Email or password is not valid'))->throwResponse();
    }
}
