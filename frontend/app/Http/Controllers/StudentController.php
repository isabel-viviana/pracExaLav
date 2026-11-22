<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
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
        $students = $this->fetchDataFromApi($url . '/students');

        return view('students.index', compact('students'));
    }

    public function show($id)
    {
        $url = env('API_BASE_URL');
        $student = $this->fetchDataFromApi($url . '/students/' . $id);

        return view('students.show', compact('student'));
    }

    public function create()
    {
        $url = env('API_BASE_URL');
        $modules = $this->fetchDataFromApi($url . '/modules');

        return view('students.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'expediente' => 'required|string|max:20',
            'fotografia' => 'nullable|image|max:2048',
            'module_id' => 'required|integer',
        ]);

        $file = $request->file('fotografia');
        unset($validated['fotografia']);

        $url = env('API_BASE_URL');
        if ($file) {
            $response = Http::attach(
                'fotografia',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            )->post($url . '/students', $validated);
        } else {
            $response = Http::post($url . '/students', $validated);
        }
        if (!$response->successful()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?: ['api' => 'No se pudo crear el estudiante. Revisa los datos e inténtalo nuevamente.']
            );
        }

        return redirect()->route('students.index')->with('success', 'Estudiante creado correctamente.');
    }

    public function edit($id)
    {
        $url = env('API_BASE_URL');
        $student = $this->fetchDataFromApi($url . '/students/' . $id);
        $modules = $this->fetchDataFromApi($url . '/modules');

        return view('students.edit', compact('student', 'modules'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'expediente' => 'required|string|max:20',
            'fotografia' => 'nullable|image|max:2048',
            'module_id' => 'required|integer',
        ]);

        $file = $request->file('fotografia');
        unset($validated['fotografia']);

        $url = env('API_BASE_URL');
        if ($file) {
            $response = Http::attach(
                'fotografia',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            )->post($url . '/students/' . $id, array_merge($validated, ['_method' => 'PUT']));
        } else {
            $response = Http::put($url . '/students/' . $id, $validated);
        }
        if (!$response->successful()) {
            return back()->withInput()->withErrors(
                $response->json('errors') ?: ['api' => 'No se pudo actualizar el estudiante. Revisa los datos e inténtalo nuevamente.']
            );
        }

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy($id)
    {
        $url = env('API_BASE_URL');
        $response = Http::delete($url . '/students/' . $id);
        if (!$response->successful()) {
            return redirect()->route('students.index')->withErrors([
                'api' => 'No se pudo eliminar el estudiante. Inténtalo nuevamente.',
            ]);
        }

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
