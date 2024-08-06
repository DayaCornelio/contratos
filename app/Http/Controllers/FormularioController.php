<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormularioController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $formularios = Formulario::with('archivos')
            ->when($search, function ($query, $search) {
                return $query->where('n_contrato', 'like', "%{$search}%")
                             ->orWhere('descripcion_contrato', 'like', "%{$search}%");
            })->get();

        return view('Formulario', ['formularios' => $formularios]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'n_contrato' => 'required|string|max:255',
            'descripcion_contrato' => 'required|string|max:255',
            'archivo.*' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $formulario = Formulario::create([
            'n_contrato' => $request->input('n_contrato'),
            'descripcion_contrato' => $request->input('descripcion_contrato'),
        ]);

        if ($request->hasFile('archivo')) {
            foreach ($request->file('archivo') as $file) {
                $path = $file->store('uploads', 'public');
                Archivo::create([
                    'formulario_id' => $formulario->id,
                    'archivo' => $path,
                    'nombre_original' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('Formulario');
    }

    public function edit($id)
    {
        $formulario = Formulario::findOrFail($id);
        $formulario->load('archivos');
        return view('Edit', compact('formulario'));
    }

    public function update(Request $request, $id)
    {
        $formulario = Formulario::findOrFail($id);

        $request->validate([
            'n_contrato' => 'required|string|max:255',
            'descripcion_contrato' => 'required|string|max:255',
            'archivo.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $formulario->update([
            'n_contrato' => $request->input('n_contrato'),
            'descripcion_contrato' => $request->input('descripcion_contrato'),
        ]);

        if ($request->hasFile('archivo')) {
            foreach ($request->file('archivo') as $file) {
                $path = $file->store('uploads', 'public');
                Archivo::create([
                    'formulario_id' => $formulario->id,
                    'archivo' => $path,
                    'nombre_original' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('Formulario');
    }

    public function destroy($id)
    {
        $formulario = Formulario::findOrFail($id);

        foreach ($formulario->archivos as $archivo) {
            Storage::disk('public')->delete($archivo->archivo);
            $archivo->delete();
        }

        $formulario->delete();

        return redirect()->route('Formulario');
    }
}
