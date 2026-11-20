<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'cedula',
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_teachers', 'teacher_id', 'module_id');
    }
}
