<?php

namespace Modules\Blog\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|min:2',
            'description' => 'sometimes|string|min:2',
            'content' => 'sometimes|string|min:2',
            'image' => 'sometimes|file|image'
        ];
    }
}
