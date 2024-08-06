<?php
namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function eliminar($id)
    {
        $archivo = Archivo::findOrFail($id);
        Storage::disk('public')->delete($archivo->archivo);
        $archivo->delete();

        return redirect()->back()->with('success', 'Archivo eliminado correctamente');
    }
}
