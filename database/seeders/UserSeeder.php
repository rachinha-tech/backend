<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'login' => 'admin',
            'date_birth' => '1990-02-20',
            'email' => 'admin@rechinha.com',
            'picture' => 'https://images.freeimages.com/fic/images/icons/2526/bloggers/256/admin.png',
            'level' => 'owner',
            'active' => true,
            'password' => 'adm12345',
        ]);
    }
}
