<?php

namespace App\Http\Controllers;
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
        request()->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'expediente' => 'required|string|max:20|unique:students,expediente',
            'fotografia' => 'nullable|string|max:255',
            'module_id' => 'required|exists:modules,id',
        ]);

        $student = Student::create($request->all());
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

        request()->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'expediente' => 'required|string|max:20|unique:students,expediente,' . $id,
            'fotografia' => 'nullable|string|max:255',
            'module_id' => 'required|exists:modules,id',
        ]);

        $student->update($request->all());
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
