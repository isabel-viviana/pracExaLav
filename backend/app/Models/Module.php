<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{

    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'module_teachers');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
