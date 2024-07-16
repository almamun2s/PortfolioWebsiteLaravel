<?php

namespace Database\Seeders;

use App\Enum\Super;
use App\Models\Home;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Enum\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /**
         * This will create a user named Super Admin with 'admin@example.com' email
         */
        $user = User::factory()->create([
            'fname' => 'Super',
            'lname' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        // Will create a Role named for Super Admin
        Role::create([
            'name' => Super::Admin,
        ]);

        // Assign the Role to User
        $user->assignRole(Super::Admin);

        Home::factory()->create();

        /**
         * Creating all Permissions =======================================
         */
        foreach (Permissions::cases() as $case) {
            Permission::create([
                'name' => $case->value,
            ]);
        }

    }
}
