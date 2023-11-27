<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'admin-dashboard',
            'teacher-dashboard',
            'classes',
            
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Create the 'admin' role and assign the 'set-role-and-permission' permission
        // $adminRole = Role::create(['name' => 'admin']);
        // $adminRole->givePermissionTo('set-role-and-permission');
    }
}
