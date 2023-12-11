<?php

namespace Modules\Auth\app\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginWithNumberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'number'   => 'required|numeric',
            'password' => 'required'
        ];
    }
}
