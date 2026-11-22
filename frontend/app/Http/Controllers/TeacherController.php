<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
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
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('teachers.index', compact('teachers'));
    }

    public function show($id)
    {
        $url = env('API_BASE_URL');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teachers.show', compact('teacher'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'cedula' => 'required|string|max:20',
        ]);

        $url = env('API_BASE_URL');
        $response = Http::post($url . '/teachers', $validated);
        if (!$response->successful()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?: ['api' => 'No se pudo crear el docente. Revisa los datos e inténtalo nuevamente.']
            );
        }

        return redirect()->route('teachers.index')->with('success', 'Docente creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('API_BASE_URL');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'cedula' => 'required|string|max:20',
        ]);

        $url = env('API_BASE_URL');
        $response = Http::put($url . '/teachers/' . $id, $validated);
        if (!$response->successful()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?: ['api' => 'No se pudo actualizar el docente. Revisa los datos e inténtalo nuevamente.']
            );
        }

        return redirect()->route('teachers.index')->with('success', 'Docente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('API_BASE_URL');
        $response = Http::delete($url . '/teachers/' . $id);
        if (!$response->successful()) {
            return redirect()->route('teachers.index')->withErrors([
                'api' => 'No se pudo eliminar el docente. Inténtalo nuevamente.',
            ]);
        }

        return redirect()->route('teachers.index')->with('success', 'Docente eliminado correctamente.');
    }
}

