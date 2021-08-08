<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    public function equipos() {
        return $this->belongsToMany(Equipo::class);
    }

    protected $fillable = ['fecha', 'lugar', 'terminado', 'equipo_local', 'goles_local', 'equipo_visita', 'goles_visita', 'user_id'];
}
