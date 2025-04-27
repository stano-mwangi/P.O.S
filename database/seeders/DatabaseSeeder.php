<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Business;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class); // 1. Create roles first

        // 2. Create a business (you can create more as needed)
        $business = Business::create([
            'name' => 'Zoey Supermart',
        ]);

        // 3. Get roles
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        // 4. Create an admin user for the business
        User::factory()->create([
            'name' => 'Zoey Daugherty',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => $adminRole->id,
            'business_id' => $business->id,
        ]);

        // 5. Create a regular user for the same business
        User::factory()->create([
            'name' => 'Employee One',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => $userRole->id,
            'business_id' => $business->id,
        ]);
    }
}
