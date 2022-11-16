<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alquiler extends Model
{
    use HasFactory;
    protected $table = 'alquilers';
    protected $primaryKey = 'id_alquiler';
    protected $foreignKey = ['DNI', 'Matricula'];

    protected $fillable =
    [
        'id_alquiler',
        'Matricula',
        'DNI',
        'fecha_salida',
        'fecha_devuelto',
        'precio_dia',
        'Multa'
    ];

    public function persona()
    {
        return $this->belongsTo(persona::class, 'DNI');
    }

    public function coche()
    {
        return $this->belongsTo(coche::class, 'Matricula');
    }
}
