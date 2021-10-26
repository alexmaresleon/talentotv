<div class="container py-8">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-student-course-table>
        <div class="px-6 py-4 flex">
            <input wire:model="search" wire:keydown="limpiar_pagina" class="form-input flex-1 shadow-sm" placeholder="Buscar curso...">
            <a class="btn btn-primary ml-2" href="{{route('thecourses.courses.index')}}"><i
                class="fas fa-search mr-2"></i>Todos mis cursos</a>

        </div>

        @if ($courses->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Maestro:
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre del curso:
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Calificación:
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Categoría/Nivel:
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full"
                                        src="{{$course->teacher->profile_photo_url}}"
                                        alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$course->teacher->name}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <a class="text-blue-400 text-sm font-bold" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$course->title}}</div>
                            <div class="text-sm text-gray-500">{{$course->subtitle}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 flex items-center">
                                {{ $course->rating }}
                                <ul class=" flex text-sm ml-2">
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
                            </div>
                            <div class="text-sm text-gray-500">Valoración del Curso</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$course->category->name}}</div>
                            <div class="text-sm text-gray-500">{{$course->level->name}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('courses.show', $course) }}" class="text-green-600 hover:text-green-900">Ver Curso</a>
                        </td>
                    </tr>

                @endforeach

                <!-- More people... -->
            </tbody>
        </table>

        <div class="px-6 py-4" >
            {{$courses->links()}}

        </div>

        @else
        <div class="px-6 py-4 text-sm text-gray-900">
            Ningun curso coincide con el criterio de busqueda, intente con otro nombre
        </div>
            
        @endif

        {{-- @foreach ($users as $user)
        {{$user}}            
        @endforeach --}}
        
        

        
    </x-student-course-table>

</div>
