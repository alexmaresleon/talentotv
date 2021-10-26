<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\User;
use Livewire\WithPagination;

class MyCourses extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        // Obtenemos la coleccion de todos los cursos del usuario autenticado a los que esta inscrito
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')                            
                            ->where('user_id', auth()->user()->id)                            
                            ->where('status', 3)
                            ->paginate(5);

        // coleccion de cursos por usuario
        // $users = User::has('description');

        return view('livewire.my-courses', compact('courses'));
    }

    public function limpiar_pagina(){
        $this->resetPage();
    }
}
