<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_contrato',
        'descripcion_contrato',
    ];

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
