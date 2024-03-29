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
         // Dashboard
         Permission::create(['name' => 'view stats','group'=>'dashboard','permission'=>'view stats'])
         ->syncRoles('admin');
         Permission::create(['name' => 'view charts','group'=>'dashboard','permission'=>'view charts'])
         ->syncRoles('admin');

         Permission::create(['name' => 'view revenue streams','group'=>'revenue stream','permission'=>'view revenue streams'])
         ->syncRoles('admin');
         Permission::create(['name' => 'add revenue streams','group'=>'revenue stream','permission'=>'add revenue streams'])
         ->syncRoles('admin');
         Permission::create(['name' => 'delete revenue streams','group'=>'revenue stream','permission'=>'delete revenue streams'])
         ->syncRoles('admin');
         Permission::create(['name' => 'edit revenue streams','group'=>'revenue stream','permission'=>'edit revenue streams'])
         ->syncRoles('admin');
         Permission::create(['name' => 'export revenue streams','group'=>'revenue stream','permission'=>'export revenue streams'])
         ->syncRoles('admin');

        //  Districts
        // Permission::create(['name' => 'view districts','group'=>'districts','permission'=>'view districts'])
        // ->syncRoles('admin');
        // Permission::create(['name' => 'add districts','group'=>'districts','permission'=>'add districts'])
        // ->syncRoles('admin');

        // Staff Members
        Permission::create(['name' => 'view staff members','group'=>'staff members','permission'=>'view staff members'])
        ->syncRoles('admin');
        Permission::create(['name' => 'add staff members','group'=>'staff members','permission'=>'add staff members'])
        ->syncRoles('admin');
        Permission::create(['name' => 'delete staff members','group'=>'staff members','permission'=>'delete staff members'])
        ->syncRoles('admin');

        // Transactions
         Permission::create(['name' => 'view transactions','group'=>'transactions','permission'=>'view transactions'])
         ->syncRoles('admin');
         Permission::create(['name' => 'view transaction details','group'=>'transactions','permission'=>'view transaction details'])
         ->syncRoles('admin');
         Permission::create(['name' => 'delete transaction','group'=>'transactions','permission'=>'delete transaction'])
         ->syncRoles('admin');
         Permission::create(['name' => 'generate report','group'=>'transactions','permission'=>'generate report'])
         ->syncRoles('admin');
         Permission::create(['name' => 'import transactions','group'=>'transactions','permission'=>'import transactions'])
         ->syncRoles('admin');
         Permission::create(['name' => 'export transactions','group'=>'transactions','permission'=>'export transactions'])
         ->syncRoles('admin');

         // User Roles
         Permission::create(['name' => 'view user roles','group'=>'staff members','permission'=>'view user roles'])
         ->syncRoles('admin');
         Permission::create(['name' => 'add user roles','group'=>'staff members','permission'=>'add user roles'])
         ->syncRoles('admin');
         
    }
}
