<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulario_id',
        'archivo',
        'nombre_original',
        'mime_type',
    ];


    public function formulario()
    {
        return $this->belongsTo(Formulario::class);
    }
}
