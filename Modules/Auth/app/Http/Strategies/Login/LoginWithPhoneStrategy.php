<?php

namespace Modules\Auth\app\Http\Strategies\Login;

use App\Http\Strategies\Strategy;
use Illuminate\Support\Facades\Auth;

class LoginWithPhoneStrategy extends Strategy
{

    public function login($phone, $password)
    {
        if(!Auth::attempt(['phone'=>$phone, 'password'=>$password]))
            return $this->respondError(__('Phone or password in not valid'))->throwResponse();
    }
}
