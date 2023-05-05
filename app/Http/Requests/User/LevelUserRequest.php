<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LevelUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
//            'level' => 'required|in:client,owner',
              'level'=> 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'level.required' => 'É obrigatório informar o level',
            'level.in'=> 'Informar: client ou owner'
        ];
    }
}
