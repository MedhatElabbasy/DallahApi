<?php

namespace Modules\Auth\app\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordWithEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        return [
            'email'    => 'required|email',
            'code'     => 'required|string',
            'password' => 'required|string|min:6'
        ];
    }
}
