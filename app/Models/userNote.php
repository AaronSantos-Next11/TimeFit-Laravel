<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userNote extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'categoria',
        'rol_id'
    ];

    public function role()
    {
        return $this->belongsTo(role::class, 'rol_id');
    }
}