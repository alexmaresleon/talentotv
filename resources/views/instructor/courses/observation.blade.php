<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold">OBSERVACIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    <div class="text-gray-500">
        Por favor tome en cuenta las siguientes observaciones antes de solicitar la publicación del curso nuevamente:
        <p>{!!$course->observation->body!!}</p>
    </div>


</x-instructor-layout>