<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'horario', 'imagen'];

    // Un servicio puede tener muchas reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
