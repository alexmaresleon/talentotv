<section class="mb-6">
    <h1 class="text-2xl font-bold">REQUISITOS DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->requirements as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">

                @if ($requirement->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input class="form-inout w-full" wire:model="requirement.name">
                        @error('requirement.name')
                            <span class="text-xs text-red-500">Este campo no debe estar vacio</span>
                        @enderror
                    </form>

                @else
                    <header class="flex justify-between">
                        <h1>{{ $item->name }}</h1>
                        <div>
                            <i wire:click="edit({{ $item }})"
                                class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{ $item }})" class="fas fa-trash text-red-500 cursor-pointer ml-1"></i>
                        </div>
                    </header>

                @endif



            </div>
        </article>

    @endforeach


    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" class="form-input w-full" placeholder="Agregar nuevo requisito">
                @error('name')
                <span class="text-xs text-red-500">Este campo no puede estar vacio</span>                    
                @enderror
                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">Agregar Requisito</button>
                </div>
            </form>

        </div>
    </article>

</section>