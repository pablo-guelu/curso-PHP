<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public function partidos() {
        return $this->belongsToMany(Partido::class);
    }

    protected $fillable = ['nombre', 'user_id'];
}
