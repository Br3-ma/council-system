<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin role
        $adminRole = Role::create(['name' => 'admin']);

        // Create admin user
        $adminUser = User::create([
            'fname' => 'Main',
            'lname' => 'Administrator',
            'email' => 'nakposadmin@gmail.com',
            'password' => bcrypt('Nkpa290224'),
        ]);

        // Assign admin role to the admin user
        $adminUser->assignRole($adminRole);
    }
}
