<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'password' => 'required|min:8',
        ];
    }

    public function getCredentials(): array
    {
        $name = $this->get('name');

        if ($this->isEmail($name)) {
            return [
                'email' => $name,
                'password' => $this->get('password')
            ];
        }

        return $this->only('name', 'password');
    }


    private function isEmail($param): bool
    {
        $factory = $this->container->make(Factory::class);

        return ! $factory->make(
            ['name' => $param],
            ['name' => 'email']
        )->fails();
    }
}
