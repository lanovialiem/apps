<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view medical checkup',
            'edit medical checkup',
            'create medical checkup',
            'delete medical checkup',

            'view employee',
            'edit employee',
            'create employee',
            'delete employee',

            'view category',
            'edit category',
            'create category',
            'delete category',

            'view category_code',
            'edit category_code',
            'create category_code',
            'delete category_code',

            'view warehouse',
            'edit warehouse',
            'create warehouse',
            'delete warehouse',

            'view stock',
            'edit stock',
            'create stock',
            'delete stock',

            'view stock movement',
            'edit stock movement',
            'create stock movement',
            'delete stock movement',

            'view product',
            'edit product',
            'create product',
            'delete product',

            'view offer',
            'edit offer',
            'create offer',
            'delete offer',

            'edit user',
            'view user',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }
    }
}
