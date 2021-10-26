<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class LessonResources extends Component
{
    // Componente de livewire para procesar imagenes
    use WithFileUploads;

    // Generamos las propiedades que vamos a usar
    public $lesson, $file;

    public function mount(Lesson $lesson){
        $this->lesson = $lesson;

    }

    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save(){

        $this->validate([
            'file'=> 'required'
        ]);

        $url = $this->file->store('resources');

        $this->lesson->resource()->create([
            'url'=> $url
        ]);

        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download(){
        return response()->download(storage_path('app/public/'. $this->lesson->resource->url));
    }

    public function destroy(){

        // Borra la imagen que esta en la carpeta resources
        Storage::delete($this->lesson->resource->url);

        // Borra el registro en la bd
        $this->lesson->resource->delete();

        // Refrescamos la informacion de la leccion
        $this->lesson = Lesson::find($this->lesson->id);

    }
}
