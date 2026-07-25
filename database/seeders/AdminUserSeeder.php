<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Creates (or promotes) the first admin user from ADMIN_EMAIL /
     * ADMIN_PASSWORD env vars. Intentionally does not fall back to a
     * hardcoded default password — set these in .env before seeding.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command->warn('Skipped admin user: set ADMIN_EMAIL and ADMIN_PASSWORD in .env before seeding.');

            return;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_NAME', 'Administrator'),
                'password' => Hash::make($password),
            ]
        )->forceFill(['is_admin' => true])->save();

        $this->command->info("Admin user ready: {$email}");
    }
}
