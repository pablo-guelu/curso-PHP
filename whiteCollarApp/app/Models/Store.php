<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Paint;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'paints_capacity', 'paints'];

    public function paints() {

        return $this->hasMany(Paint::class);

    }
}
