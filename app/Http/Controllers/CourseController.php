<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index');
    }

    public function show(Course $course){

        $this->authorize('published', $course);

        $relacionados = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 3)
            ->latest('id')
            ->take(5)
            ->get();

        return view('courses.show', compact('course', 'relacionados'));
    }

    public function enrolled(Course $course){
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $course);

    }

    // public function mycourses() {
 
    //     $courses = auth()->user()->courses_enrolled;
    //     return view('courses.mycourses', compact('courses'));
      
    // }

    /* public function status(Course $course){
        return view('courses.status', compact('course'));

    } */
}
