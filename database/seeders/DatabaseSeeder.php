<?php

namespace Database\Seeders;

use App\Enum\Super;
use App\Models\Home;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        Permission::create([
            'name' => 'portfolio.show',
        ]);
        Permission::create([
            'name' => 'portfolio.edit',
        ]);
        Permission::create([
            'name' => 'portfolio.add',
        ]);
        Permission::create([
            'name' => 'portfolio.delete',
        ]);

        // Home =========================
        Permission::create([
            'name' => 'home.banner',
        ]);
        Permission::create([
            'name' => 'home.welcome',
        ]);
        Permission::create([
            'name' => 'home.service',
        ]);

        Permission::create([
            'name' => 'home.service.show',
        ]);
        Permission::create([
            'name' => 'home.service.add',
        ]);
        Permission::create([
            'name' => 'home.service.edit',
        ]);
        Permission::create([
            'name' => 'home.service.delete',
        ]);
        
        
        Permission::create([
            'name' => 'home.process',
        ]);
        Permission::create([
            'name' => 'home.process.show',
        ]);
        Permission::create([
            'name' => 'home.process.add',
        ]);
        Permission::create([
            'name' => 'home.process.edit',
        ]);
        Permission::create([
            'name' => 'home.process.delete',
        ]);

        Permission::create([
            'name' => 'home.portfolio',
        ]);

        // About ======================
        Permission::create([
            'name' => 'about',
        ]);

        Permission::create([
            'name' => 'about.status.show',
        ]);
        Permission::create([
            'name' => 'about.status.add',
        ]);
        Permission::create([
            'name' => 'about.status.edit',
        ]);
        Permission::create([
            'name' => 'about.status.delete',
        ]);

        Permission::create([
            'name' => 'about.social.show',
        ]);
        Permission::create([
            'name' => 'about.social.add',
        ]);
        Permission::create([
            'name' => 'about.social.edit',
        ]);
        Permission::create([
            'name' => 'about.social.delete',
        ]);

        // Message
        Permission::create([
            'name' => 'message.show',
        ]);
        Permission::create([
            'name' => 'message.read',
        ]);
        Permission::create([
            'name' => 'message.read.all',
        ]);
        Permission::create([
            'name' => 'message.delete',
        ]);
        
        // Category
        Permission::create([
            'name' => 'category.show',
        ]);
        Permission::create([
            'name' => 'category.add',
        ]);
        Permission::create([
            'name' => 'category.edit',
        ]);
        Permission::create([
            'name' => 'category.delete',
        ]);
        
        // Role
        Permission::create([
            'name' => 'role.show',
        ]);
        Permission::create([
            'name' => 'role.edit',
        ]);
        Permission::create([
            'name' => 'role.add',
        ]);
        Permission::create([
            'name' => 'role.delete',
        ]);
        Permission::create([
            'name' => 'role.permission',
        ]);
        
        // Others
        Permission::create([
            'name' => 'permission',
        ]);
        Permission::create([
            'name' => 'user.show',
        ]);
        Permission::create([
            'name' => 'user.edit',
        ]);

    }
}
