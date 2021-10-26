<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!! $current->iframe !!}
            </div>
            <h1 class="text-2xl text-gray-600 font-bold mt-4">
                {{ $current->name }}
            </h1>
            @if ($current->description)
                <div class="text-gray-600">
                    {{ $current->description->name }}
                </div>
            @endif

            {{-- Control del avance del curso --}}
            <div class="flex justify-between mt-4">
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-xl text-blue-600"></i>

                    @else
                        <i class="fas fa-toggle-off text-xl text-gray-600"></i>

                    @endif
                    <p class="text-sm ml-2">Marcar este tema como aprendido</p>
                </div>

                {{-- Recursos --}}
                @if ($current->resource)
                <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                    <i class="fas fa-download text-lg text-gray-600"></i>
                    <p class="text-sm ml-2">Descargar recurso</p>
                </div>
                    
                @endif
                

            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer ">Tema Anterior</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Tema
                            Siguiente</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-boy">
                <h1 class="text-xl leading-8 text-center mb-4">{{ $course->title }}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4"
                            src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>

                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500 text-sm "
                            href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>

                <p class="text-sm text-gray-600 ml-4 mt-2">Avance del curso {{ $this->advance }}%</p>

                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                        <div style="width:{{ $this->advance . '%' }}"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
                        </div>
                    </div>
                </div>

                <ul class="">
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2" href="">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex ">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <i class="far fa-play-circle text-gray-500 mr-2 mt-1"></i>
                                                @else
                                                    <i class="far fa-check-circle text-gray-700 mr-2 mt-1"></i>

                                                @endif

                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <i class="far fa-play-circle text-gray-500 mr-2 mt-1"></i>
                                                @else
                                                    <i class="far fa-circle text-gray-500 mr-2 mt-1"></i>

                                                @endif

                                            @endif


                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})">
                                            {{ $lesson->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<footer class="mt-24 bg-gray-700 py-12">
    <div class="max-w-full bg-orange-300 p-4"></div>
    <div class="max-w-full text-center bg-gray-700 text-white p-4">
        <div class="text-lg font-bold"> <a class="hover:underline" href="http://talentotv.com.mx/" target="_blank">@TalentoTV</a></div>
    </div>
</footer>
