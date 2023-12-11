<?php

namespace Modules\Auth\app\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Modules\Auth\Services\ResetPasswordService;
use Modules\Auth\app\Http\Requests\Api\ResetPasswordWithEmailRequest;
use Modules\Auth\app\Http\Requests\Api\ForgotPasswordWithEmailRequest;
use Modules\Auth\app\Http\Requests\Api\ForgotPasswordVerifyCodeWithEmailRequest;

class ResetPasswordController extends Controller
{
    public function __construct(
        private ResetPasswordService $resetPasswordService,
    ) {}

    public function forgotWithEmail(ForgotPasswordWithEmailRequest $request)
    {
        $this->resetPasswordService->forgotWithEmail($request->email);

        return $this->respondWithSuccess([
            'message' => __('A password reset code has been sent')
        ]);
    }

    public function forgotVerifyWithEmail(ForgotPasswordVerifyCodeWithEmailRequest $request)
    {
        $this->resetPasswordService->forgotVerifyWithEmail(
            $request->email,
            $request->code
        );

        return $this->respondWithSuccess([
            'message' => __('The code is valid')
        ]);
    }

    public function resetWithEmail(ResetPasswordWithEmailRequest $request)
    {
        $this->resetPasswordService->resetWithEmail(
            $request->email,
            $request->code,
            $request->password
        );

        return $this->respondWithSuccess([
            'message' => __('The password has been reset successfully')
        ]);
    }
}
