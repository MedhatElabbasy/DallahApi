<?php

namespace Modules\Auth\app\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Modules\Auth\Services\RegisterService;
use Modules\Auth\app\Http\Requests\Api\RegisterWithEmailRequest;
use Modules\Auth\app\Http\Requests\Api\RegisterWithPhoneRequest;

class RegisterController extends Controller
{
    public function __construct(
        private RegisterService $registerService,
    ) {}

    public function registerWithEmail(RegisterWithEmailRequest $request)
    {
        /*
        $data = $this->registerService->registerWithEmail(
            $request->name,
            $request->email,
            $request->password
        );

        return $this->respondWithSuccess([
            "data" => [
                "token" => $data['token'],
                "user" => $data['user']
            ],
            "message" => "register"
        ]);
        */
    }

    public function registerWithPhone(RegisterWithPhoneRequest $request)
    {
        /*
        $data = $this->registerService->registerWithPhone(
            $request->name,
            $request->phone,
            $request->password
        );

        return $this->respondWithSuccess([
            "message" => __('You have been logged in successfully'),
            "data" => [
                "token" => $data['token'],
                "user" => $data['user']
            ]
        ]);
        */
    }
}
