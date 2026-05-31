<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Warehouse
        $adminWarehouse = Role::create(['name' => 'Admin Warehouse']);
        $adminWarehouse->givePermissionTo([
            'view warehouse',
            'create warehouse',
            'edit warehouse',
            'delete warehouse',

            'view stock',
            'create stock',
            'edit stock',
            'delete stock',

            'view stock movement',
            'create stock movement',
            'edit stock movement',
            'delete stock movement',

            'view approval',
            'create approval',
            'edit approval',
            'delete approval',

            'view offer',

            'view product'
        ]);

        // Admin HRD
        $adminHRD = Role::create(['name' => 'Admin HRD']);
        // $adminHRD = Role::findByName('Admin HRD');
        $adminHRD->givePermissionTo([
            'view medical checkup',
            'create medical checkup',
            'edit medical checkup',
            'delete medical checkup',

            'view employee',
            'create employee',
            'edit employee',
            'delete employee',

            'view category',
            'create category',
            'edit category',
            'delete category',

            'view category_code',
            'create category_code',
            'edit category_code',
            'delete category_code',
        ]);

        // Admin Marketing
        $adminMarketing = Role::create(['name' => 'Admin Marketing']);
        $adminMarketing->givePermissionTo([
            'view offer',
            'create offer',
            'edit offer',
            'delete offer',
        ]);

        $manager = Role::create(['name' => 'Manager']);
        $manager->givePermissionTo([
            'view approval',
            'create approval',
            'edit approval',
            'delete approval',
            
            'view offer',
            'view product',
        ]);

        $director = Role::create(['name' => 'Director']);
        $director->givePermissionTo([
            'view approval',
            'create approval',
            'edit approval',
            'delete approval',
            
            'view offer',
            'view product',
        ]);

        // Super Admin
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());
    }
}
