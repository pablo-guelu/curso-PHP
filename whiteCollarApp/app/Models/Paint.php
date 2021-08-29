<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Paint extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'entry', 'store_id', 'store'];

    public function store() {

        return $this->belongsTo(Store::class);
        
    }
}
