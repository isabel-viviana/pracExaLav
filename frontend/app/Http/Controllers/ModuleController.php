<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModuleController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        $response->throw();

        return $response->json();
    }

    public function index()
    {
        $url = env('API_BASE_URL');
        $modules = $this->fetchDataFromApi($url . '/modules');

        return view('modules.index', compact('modules'));
    }

    public function show($id)
    {
        $url = env('API_BASE_URL');
        $module = $this->fetchDataFromApi($url . '/modules/' . $id);

        return view('modules.show', compact('module'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
        ]);

        $url = env('API_BASE_URL');
        $response = Http::post($url . '/modules', $validated);
        if (!$response->successful()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?: ['api' => 'No se pudo crear el módulo. Revisa los datos e inténtalo nuevamente.']
            );
        }

        return redirect()->route('modules.index')->with('success', 'Módulo creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('API_BASE_URL');
        $module = $this->fetchDataFromApi($url . '/modules/' . $id);

        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
        ]);

        $url = env('API_BASE_URL');
        $response = Http::put($url . '/modules/' . $id, $validated);
        if (!$response->successful()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?: ['api' => 'No se pudo actualizar el módulo. Revisa los datos e inténtalo nuevamente.']
            );
        }

        return redirect()->route('modules.index')->with('success', 'Módulo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('API_BASE_URL');
        $response = Http::delete($url . '/modules/' . $id);
        if (!$response->successful()) {
            return redirect()->route('modules.index')->withErrors([
                'api' => 'No se pudo eliminar el módulo. Inténtalo nuevamente.',
            ]);
        }

        return redirect()->route('modules.index')->with('success', 'Módulo eliminado correctamente.');
    }
}
