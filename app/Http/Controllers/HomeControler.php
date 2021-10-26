<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeControler extends Controller
{
    // Ruta de la pagina principal de la app
    public function __invoke()
    {
        // Regresamos el contenido de todos los cursos
        $courses = Course::where('status', '3')->latest('id')->get()->take(8);
        
        // Regresa la coleccion completa de los cursos
        //return $courses;

        // Rating
        //return Course::find(12)->rating;


        return view('welcome', compact('courses'));
        
    }
}
