<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $warehouseRole = Role::firstOrCreate(['name' => 'warehouse']);

        // Crear permisos de ejemplo

        $manageUsers = Permission::firstOrCreate(['name' => 'manage.users']);
        $manageStock = Permission::firstOrCreate(['name' => 'manage.stock']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo([$manageUsers, $manageStock]);
        $warehouseRole->givePermissionTo($manageStock);
    }
}
