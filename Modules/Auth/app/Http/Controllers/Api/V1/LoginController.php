<?php

namespace Modules\Auth\app\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Modules\Auth\Services\LoginService;
use Modules\Auth\app\Http\Requests\Api\LoginWithEmailRequest;
use Modules\Auth\app\Http\Requests\Api\LoginWithPhoneRequest;
use Modules\Auth\app\Http\Requests\Api\LoginWithNumberRequest;

class LoginController extends Controller
{
    public function __construct(
        private LoginService $loginService,
    ) {}

    private function data($data){
        return $this->respondWithSuccess([
            "data" => [
                "token" => $data['token'],
                "user" => $data['user']
            ],
            "message" => "login"
        ]);
    }

    public function loginWithEmail(LoginWithEmailRequest $request)
    {
        $data = $this->loginService->loginWithEmail(
            $request->email,
            $request->password
        );

        return $this->data($data);
    }

    public function loginWithPhone(LoginWithPhoneRequest $request)
    {
        $data = $this->loginService->loginWithPhone(
            $request->phone,
            $request->password
        );

        return $this->data($data);
    }

    public function loginWithNumber(LoginWithNumberRequest $request)
    {
        $data = $this->loginService->loginWithNumber(
            $request->number,
            $request->password
        );

        return $this->data($data);
    }
}
