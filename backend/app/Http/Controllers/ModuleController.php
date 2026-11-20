<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Module;


class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return response()->json($modules, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
        ]);

        $module = Module::create($validated);
        return response()->json($module, 201);
    }

    public function show($id)
    {
        $module = Module::find($id);
        if (!$module) {
            return response()->json(['mensaje' => 'modulo no encontrado'], 404);
        }
        return response()->json($module, 200);
    }

    public function update(Request $request, $id)
    {
        $module = Module::find($id);
        if (!$module) {
            return response()->json(['mensaje' => 'modulo no encontrado'], 404);
        }

        $validated = $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
        ]);

        $module->update($validated);
        return response()->json($module, 200);
    }

    public function destroy($id)
    {
        $module = Module::find($id);
        if (!$module) {
            return response()->json(['mensaje' => 'modulo no encontrado'], 404);
        }
        
        $module->delete();
        return response()->json(['mensaje' => 'modulo eliminado'], 200);
    }

}
