<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{    

    public function index(){
        
        $courses = Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course){
        
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course){

        $this->authorize('revision', $course);

        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {

            return back()->with('info', 'No se puede publicar un curso incompleto');
        }

        $course->status = 3;
        $course->save();

        // Enviamos correo al maestro
        $mail = new ApprovedCourse($course);

        Mail::to($course->teacher->email)->queue($mail);
        
        // Redircciona al usuario a la pagina de cursos por aprobar
        return redirect()->route('admin.courses.index')->with('info', 'Curso publicado exitosamente');

    }

    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));

    }

    public function reject(Request $request, Course $course){

        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all());
        
        //Regresamos el estatus del curso a borrador
        $course->status = 1;
        $course->save();

        // Enviamos el correo al maestro con las observaciones        
        $mail = new RejectCourse($course);

        Mail::to($course->teacher->email)->queue($mail);

        // Redircciona al usuario a la pagina de cursos por aprobar
        return redirect()->route('admin.courses.index')->with('info', 'Se enviarón las observaciones al maestro con exito');

    }
}
