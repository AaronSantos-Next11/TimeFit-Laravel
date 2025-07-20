<?php
// App\Models\Permiso.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permiso extends Model
{
    protected $fillable = [
        'rol_id',
        'permiso'
    ];

    public function role()
    {
        return $this->belongsTo(role::class, 'rol_id');
    }
}
