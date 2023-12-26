<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);

        // Create permissions
        Permission::create(['name' => 'view admin dashboard']);
        Permission::create(['name' => 'view employee dashboard']);

        // Assign permissions to roles
        Role::findByName('admin')->givePermissionTo('view admin dashboard');
        Role::findByName('employee')->givePermissionTo('view employee dashboard');
    }
}
