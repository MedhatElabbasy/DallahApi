<?php

namespace Modules\Blog\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'content' => 'required|string|min:2',
            'image' => 'required|file|image'
        ];
    }
}
