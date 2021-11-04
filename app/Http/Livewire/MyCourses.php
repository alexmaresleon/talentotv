<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\User;
use Livewire\WithPagination;

class MyCourses extends Component
{
    use WithPagination;
    //public $course, $search, $user;
    public $user, $search, $user_id;

    public function mount(User $user){
        $this->user = $user;        
    }

    public function render()
    {
        $user_id= auth()->user()->id;
        $user = User::find($user_id);
        $my_courses = $user->courses_enroled;         
        
        return view('livewire.my-courses', compact('my_courses'));
    }

    public function limpiar_pagina(){
        $this->resetPage();
    }
}
