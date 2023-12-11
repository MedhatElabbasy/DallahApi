<?php

namespace Modules\Auth\app\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterWithPhoneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|min:2',
            'phone'    => 'required|numeric',
            'password' => 'required'
        ];
    }
}
