<?php

namespace App\Http\Controllers;

use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'expediente' => 'required|string|max:20|unique:students,expediente',
            'fotografia' => 'nullable|image|max:2048',
            'module_id' => 'required|exists:modules,id',
        ]);

        $file = $request->file('fotografia');
        unset($validated['fotografia']);

        if ($file) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('services.cloudinary.cloud_name'),
                    'api_key' => config('services.cloudinary.api_key'),
                    'api_secret' => config('services.cloudinary.api_secret'),
                ],
            ]);

            $upload = $cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                ['folder' => 'students']
            );
            $validated['fotografia'] = $upload['secure_url'];
        }

        $student = Student::create($validated);
        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['mensaje' => 'estudiante no encontrado'], 404);
        }
        return response()->json($student, 200);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['mensaje' => 'estudiante no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'expediente' => 'required|string|max:20|unique:students,expediente,' . $id,
            'fotografia' => 'nullable|image|max:2048',
            'module_id' => 'required|exists:modules,id',
        ]);

        $file = $request->file('fotografia');
        unset($validated['fotografia']);

        if ($file) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('services.cloudinary.cloud_name'),
                    'api_key' => config('services.cloudinary.api_key'),
                    'api_secret' => config('services.cloudinary.api_secret'),
                ],
            ]);

            $upload = $cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                ['folder' => 'students']
            );
            $validated['fotografia'] = $upload['secure_url'];
        }

        $student->update($validated);
        return response()->json($student, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['mensaje' => 'estudiante no encontrado'], 404);
        }

        $student->delete();
        return response()->json(['mensaje' => 'estudiante eliminado exitosamente'], 200);
    }
}
