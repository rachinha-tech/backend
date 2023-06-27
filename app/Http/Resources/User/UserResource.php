<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "login" => $this->login,
            "date_birth" => $this->date_birth,
            "email" => $this->email,
            //"picture" => $this->picture,
            "level" => $this->level,
            "active" => $this->active,
        ];
    }
}
