<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Check if admin already exists
        $adminExists = User::where('email', 'admin@famfashion.com')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@famfashion.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]);
            $this->command->info('Admin user created!');
        } else {
            $this->command->info('Admin user already exists. Skipping...');
        }
    }
}
