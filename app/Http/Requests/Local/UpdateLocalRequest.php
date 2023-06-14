<?php

namespace App\Http\Requests\Local;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
//            'url_image' => 'string'
        ];
    }
}
