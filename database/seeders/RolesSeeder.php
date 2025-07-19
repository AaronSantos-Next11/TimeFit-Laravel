<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'nombre_rol' => 'Administrador',
            'permiso_id' => json_encode([1, 2, 3, 4])
        ]);

        Role::create([
            'nombre_rol' => 'Colaborador',
            'permiso_id' => json_encode([1, 2])
        ]);

        Role::create([
            'nombre_rol' => 'Desarrollador',
            'permiso_id' => json_encode([1, 2, 3])
        ]);
    }
}
