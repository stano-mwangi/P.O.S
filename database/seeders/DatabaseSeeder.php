<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class); // Should create roles
    
        // User::factory(10)->create();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        
        User::factory()->create([
            'email' => 'admin@example.com',
            'role_id' => $adminRole->id,
        ]);
        
        User::factory()->create([
            'email' => 'user@example.com',
            'role_id' => $userRole->id,
        ]);
        
    }
}
