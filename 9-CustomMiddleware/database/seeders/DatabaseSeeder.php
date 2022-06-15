<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['role' => 'admin'],
            ['role' => 'moderator']
        ]);

        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'role' => Role::where('role', 'admin')->firstOrFail()->role,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
            [
                'name' => 'Moderator',
                'email' => 'moderator@email.com',
                'role' => Role::where('role', 'moderator')->firstOrFail()->role,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]
        ]);
    }
}
