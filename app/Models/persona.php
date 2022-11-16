<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'DNI';
    protected $fillable =
    [
        'DNI',
        'Nombre',
        'Tfno',
        'edad',
        'rol'
    ];

    public function alquiler()
    {
        return $this->hasMany(alquiler::class, 'DNI');
    }


}
