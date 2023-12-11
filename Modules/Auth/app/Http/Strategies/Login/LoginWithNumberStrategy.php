<?php

namespace Modules\Auth\app\Http\Strategies\Login;

use App\Http\Strategies\Strategy;
use Illuminate\Support\Facades\Auth;

class LoginWithNumberStrategy extends Strategy
{

    public function login($number, $password)
    {
        if(!Auth::attempt(['id_card_number'=>$number, 'password'=>$password]) and !Auth::attempt(['job_number'=>$number, 'password'=>$password]))
            return $this->respondError(__('Number or password is not valid'))->throwResponse();
    }
}
