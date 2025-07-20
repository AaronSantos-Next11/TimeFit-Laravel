<?php
// App\Models\Role.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = [
        'nombre_rol',
        'permiso_id'
    ];

    protected $casts = [
        'permiso_id' => 'array'
    ];

    public function permisos()
    {
        return $this->hasMany(permiso::class, 'rol_id');
    }

    public function userNotes()
    {
        return $this->hasMany(userNote::class, 'rol_id');
    }
}