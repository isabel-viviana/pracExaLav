<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return response()->json($teachers, 200);

    }

    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'cedula' => 'required|string|max:20|unique:teachers,cedula',
        ]);

        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['mensaje' => 'profesor no encontrado'], 404);
        }
        return response()->json($teacher, 200);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['mensaje' => 'profesor no encontrado'], 404);
        }

        request()->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'cedula' => 'required|string|max:20|unique:teachers,cedula,' . $id,
        ]);

        $teacher->update($request->all());
        return response()->json($teacher, 200);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['mensaje' => 'profesor no encontrado'], 404);
        }

        $teacher->delete();
        return response()->json(['mensaje' => 'profesor eliminado exitosamente'], 200);
    }
}
