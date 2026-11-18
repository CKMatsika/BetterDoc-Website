<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');
        if ($email && $password && ! User::where('email', $email)->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => $email,
                'password' => $password,
                'is_admin' => true,
            ]);
        }
    }
}
