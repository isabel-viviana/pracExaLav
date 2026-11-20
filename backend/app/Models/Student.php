<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{

    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'fechaNacimiento',
        'expediente',
        'fotografia',
        'module_id',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
