<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\permiso;

class PermisosSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            ['rol_id' => 1, 'permiso' => 'crear_usuarios'],
            ['rol_id' => 1, 'permiso' => 'editar_usuarios'],
            ['rol_id' => 1, 'permiso' => 'eliminar_usuarios'],
            ['rol_id' => 1, 'permiso' => 'ver_reportes'],
            ['rol_id' => 2, 'permiso' => 'crear_notas'],
            ['rol_id' => 2, 'permiso' => 'editar_notas'],
            ['rol_id' => 3, 'permiso' => 'acceso_codigo'],
            ['rol_id' => 3, 'permiso' => 'deploy_aplicacion'],
        ];

        foreach ($permisos as $permiso) {
            Permiso::create($permiso);
        }
    }
}
