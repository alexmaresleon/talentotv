<div class="container py-8">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-student-course-table>
        <div class="px-6 py-4 flex">
            <input wire:model="search" wire:keydown="limpiar_pagina" class="form-input flex-1 shadow-sm"
                placeholder="Buscar curso...">
            <a class="btn btn-primary ml-2" href="{{ route('thecourses.courses.index') }}"><i
                    class="fas fa-search mr-2"></i>Todos mis cursos</a>

        </div>

        @if ($my_courses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre del curso:
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripción:
                        </th>                        
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($my_courses as $course)
                        <tr>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->title }}</div>                                
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">                                
                                <div class="text-sm text-gray-900">{{ $course->subtitle }}</div>
                            </td>                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('courses.show', $course) }}"
                                    class="text-green-600 hover:text-green-900">Ver Curso</a>
                            </td>
                        </tr>

                    @endforeach

                    <!-- More people... -->
                </tbody>
            </table>

            <div class="px-6 py-4">
                

            </div>

        @else
            <div class="px-6 py-4 text-sm text-gray-900">
                No tienes cursos, visita nuestro catálogo y adquiere uno.
            </div>

        @endif
        

</x-student-course-table>


</div>
