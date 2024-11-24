<?php

namespace App\Models;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;
    
    public function servicios() {
        return $this->hasMany(Servicio::class);
    }
}