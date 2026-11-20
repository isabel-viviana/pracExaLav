<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{

    public function index()
    {
        $response = Http::get('http://pracexalaravel.test/backend/public/api/teachers');

        $teachers = $response->json();

        return view('teachers.index', compact('teachers'));
    }
}

