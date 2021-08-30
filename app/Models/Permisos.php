<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
