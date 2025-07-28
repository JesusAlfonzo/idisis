<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Ejecutar el seeder de roles y permisos
        $this->call(RolesAndPermissionsSeeder::class);

        // Crear el usuario administrador y asignarle el rol admin
        $admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'snowy@admin.com',
            'password' => bcrypt('673660aa'), // Cambia la contraseña luego
        ]);
        $admin->assignRole('admin');
    }
}
