<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class PaymentController extends Controller
{
    public function checkout(Course $course){

        return view('payment.checkout', compact('course'));

    }

    public function approved(Request $request, Course $course){

        //return $request->all();
        
        // Validado el pago le asigna el accceso al usuario
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $course);
    }
}
