<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    //protected $fillable= ['titulo','descripcion'];
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
