<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\userNote;

class UserNotesSeeder extends Seeder
{
    public function run()
    {
        UserNote::create([
            'titulo' => 'Reunión de equipo',
            'descripcion' => 'Discutir los avances del proyecto y planificar las siguientes fases de desarrollo.',
            'categoria' => 'recordatorio',
            'rol_id' => 1
        ]);

        UserNote::create([
            'titulo' => 'Revisar documentación',
            'descripcion' => 'Actualizar la documentación técnica del sistema y verificar que esté completa.',
            'categoria' => 'nota',
            'rol_id' => 3
        ]);

        UserNote::create([
            'titulo' => 'Llamar a cliente',
            'descripcion' => 'Contactar al cliente para confirmar los requerimientos del nuevo módulo.',
            'categoria' => 'sugerencia',
            'rol_id' => 2
        ]);
    }
}