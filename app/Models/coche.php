<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coche extends Model
{
    use HasFactory;
    protected $table = 'coches';
    protected $primaryKey = 'Matricula';
    protected $fillable =
    [
        'matricula',
        'marca',
        'modelo'
    ];

    public function alquiler()
    {
        return $this->hasMany(alquiler::class, 'Matricula');
    }

    public function persona()
    {
        return $this->hasMany(persona::class, 'DNI');
    }
}
