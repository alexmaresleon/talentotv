@props(['course'])

<article class="card flex flex-col">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
    <div class="card-body flex-1 flex flex-col">
        <h1 class="card-title">{{ Str::limit($course->title, 35) }}</h1>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Mentor: {{ Str::limit($course->teacher->name, 25) }}</p>

        <div class="flex ">
            <ul class=" flex text-sm">
                <li class="mr-1"><i
                        class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i
                        class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i
                        class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i
                        class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i
                        class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-user"></i>
                ({{ $course->students_count }})
            </p>
        </div>
    </div>

    @if ($course->price->value == 0)
        <p class="my-2 ml-4 text-green-700 font-bold">Curso Gratuito</p>
    @else
        <p class="my-2 ml-4 text-gray-500 font-bold">Costo: ${{ $course->price->value }} Pesos</p>
    @endif


    <a href="{{ route('courses.show', $course) }}" class="mt-2 btn btn-primary btn-block">
        Más detalles
    </a>
</article>
