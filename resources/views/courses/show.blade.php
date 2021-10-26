<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover " src="{{ Storage::url($course->image->url) }}" alt="">
            </figure>

            <div class="text-white">
                <h1 class="text-3xl ">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="far fa-file-video"></i> Tema: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Estudiantes: {{ $course->students_count }}</p>
                <p><i class="fas fa-star"></i> Calificación del curso: {{ $course->rating }}</p>

            </div>

        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <!-- Aprendizaje -->
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base "><i
                                    class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}</li>

                        @endforeach
                    </ul>

                </div>
            </section>

            <!-- Temario -->

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">
                    Temario
                </h1>

                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" @if ($loop->first)
                        x-data="{ open: true }"
                    @else
                        x-data="{ open: false }"
                @endif>

                <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open= !open">
                    <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                </header>

                <div class="bg-white px-4 py-2" x-show="open">
                    <ul class="grid grid-cols-1 gap-1">
                        @foreach ($section->lessons as $lesson)
                            <li class="text-gray-700 text-base"><i
                                    class="fas fa-play-circle mr-2 text-gray-600"></i>{{ $lesson->name }}</li>

                        @endforeach
                    </ul>

                </div>

                </article>
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>

                    @endforeach
                </ul>
            </section>

            <section class="">
                <h1 class="font-bold text-3xl">Descripción del curso</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>

            </section>

            @livewire('courses-reviews', ['course' => $course])


        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Maestro: {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>

                    {{-- Ver o comprar curso --}}
                    @can('enrolled', $course)
                        <a class="btn btn-danger btn-block mt-4" href="{{ route('courses.status', $course) }}">Ir al
                            curso</a>
                    @else
                        @if ($course->price->value == 0)
                            <p class="text-2xl text-center font-bold text-gray-500 mt-3 mb-2">Curso Gratuito</p>
                            <form action="{{ route('courses.enroled', $course) }}" method="post">
                                @csrf
                                <button class="btn btn-danger btn-block" type="submit">Obtener Curso</button>
                            </form>

                        @else
                            <p class="text-2xl text-center font-bold text-gray-500 mt-3 mb-2">Costo: ${{ $course->price->value }} Pesos</p>
                            <a class="btn btn-danger btn-block" href="{{route('payment.checkout', $course)}}">Comprar Curso</a>

                        @endif
                    @endcan
                </div>
            </section>
            <aside class="hidden lg:block">
                @foreach ($relacionados as $relacionado)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($relacionado->image->url) }}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="text-bold text-gray-500 mb-3"
                                    href="{{ route('courses.show', $relacionado) }}">{{ Str::limit($relacionado->title, 40) }}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                    src="{{ $relacionado->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{ $relacionado->teacher->name }}</p>
                            </div>
                            <p class="text-sm"><i
                                    class="text-yellow-400 fas fa-star mr-2"></i>{{ $relacionado->rating }}</p>
                        </div>
                    </article>

                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>
