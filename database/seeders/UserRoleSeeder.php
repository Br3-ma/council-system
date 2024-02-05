<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = Role::create(['name' => 'admin']);

         // Dashboard
         Permission::create(['name' => 'view stats','group'=>'dashboard','permission'=>'view stats'])
         ->syncRoles('admin');
         Permission::create(['name' => 'view charts','group'=>'dashboard','permission'=>'view charts'])
         ->syncRoles('admin');

         // Menu
         Permission::create(['name' => 'view revenue streams','group'=>'dashboard','permission'=>'view revenue streams'])
         ->syncRoles('admin');

        //  Districts

        // Revenue Streams

        // Staff Members

        // Transactions

        // User Roles
    }
}
