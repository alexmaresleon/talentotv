<div>
    @foreach ($section->lessons as $item)

        <article class="card mt-4" x-data="{open:false}">
            <div class="card-body">
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="lesson.name" class="form-input w-full">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror


                        <div class="flex items-center mt-2">
                            <label class="w-32">Encoder: </label>
                            <select
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                wire:model="lesson.platform_id">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <div class="flex items-center mt-2">
                                <label class="w-32">URL:</label>
                                <input wire:model="lesson.url" class="form-input w-full">
                            </div>
                            @error('lesson.url')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <button type="button" class="btn btn-danger ml-1" wire:click="cancel">Cancelar</button>
                            </div>
                        </div>
                    </form>

                @else
                    <header>
                        <h1 x-on:click="open = !open" class="flex items-center cursor-pointer">
                            <i class="far fa-play-circle text-green-500 mr-1"></i>
                            <strong>Leccion: </strong> {{ $item->name }}
                        </h1>
                    </header>

                    <div x-show="open">

                        <hr class="my-2">


                        <p class="text-sm">Encoder: {{ $item->platform->name }} </p>
                        <p class="text-sm">Enlace seguro: <a class="text-blue-600" href="{{ $item->url }}"
                                target="_blank">{{ $item->url }}</a></p>

                        <div class="my-2">
                            <button class="btn btn-primary text-sm"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button class="btn btn-danger text-sm ml-1"
                                wire:click="destroy({{ $item }})">Eliminar</button>
                        </div>


                        <div class="mb-2">
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-'.$item->id))
                        </div>

                        <div>
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources-'.$item->id))
                        </div>
                    </div>

                @endif
            </div>
        </article>

    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar Lección
        </a>


        <article class="card" x-show="open">
            <div class="card-body ">
                <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>

                <div class="mb-4">
                    <div>
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="name" class="form-input w-full" placeholder="Nombre de la nueva lección">
                        </div>
                        @error('name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center mt-2">
                        <label class="w-32">Encoder: </label>
                        <select
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            wire:model="platform_id">
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('platform_id')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div>
                        <div class="flex items-center mt-2">
                            <label class="w-32">URL:</label>
                            <input wire:model="url" class="form-input w-full">
                        </div>
                        @error('url')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-primary" wire:click="store">Agregar</button>
                    <button class="btn btn-danger ml-1" x-on:click="open = false">Cancelar</button>

                </div>
            </div>
        </article>
    </div>
</div>
