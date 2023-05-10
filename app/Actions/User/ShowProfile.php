<?php

namespace App\Actions\User;

use App\Models\User;

class ShowProfile
{
    public function handle(User $user): array
    {
        $user = $user
            ->query()
            ->where('id', $user->id)
            ->first();

        return [
            'user' => $user,
        ];
    }
}
