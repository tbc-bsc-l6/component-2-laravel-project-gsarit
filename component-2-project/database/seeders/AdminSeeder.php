<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Get admin role
        $adminRole = UserRole::where('role', 'admin')->first();

        if (!$adminRole) {
            $this->command->error('Admin role not found. Run UserRoleSeeder first.');
            return;
        }

        // Prevent duplicate admin creation
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
                'user_role_id' => $adminRole->id,
            ]
        );
    }
}
