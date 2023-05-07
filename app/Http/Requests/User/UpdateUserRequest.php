<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'date_birth' => 'required|date',
            'picture' => 'required|string',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
