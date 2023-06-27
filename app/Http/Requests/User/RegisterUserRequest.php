<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'login' => 'required|string',
            'name' => 'required|string',
            'date_birth' => 'required|date',
            //'picture' => 'required|string',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
