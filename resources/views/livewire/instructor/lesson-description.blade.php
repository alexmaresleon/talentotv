<div>
    <article class="card" x-data="{open:false}">
        <div class="card-body bg-gray-200">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la lección: </h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-imput w-full"></textarea>
                        @error('description.name')
                        <span class="text-sm text-red-500">{{$message}}</span>
                            
                        @enderror

                        <div class="flex justify-end">
                            <button class="btn btn-primary text-sm" type="submit">Actualizar</button>
                            <button wire:click="destroy" class="btn btn-danger text-sm ml-2" class="btn btn-danger" type="button">Eliminar</button>
                        </div>
                    </form>

                @else
                <div>
                    <textarea wire:model="name" class="form-imput w-full" placeholder="Agrega una descripción para esta lección..."></textarea>
                    @error('name')
                    <span class="text-sm text-red-500">{{$message}}</span>
                        
                    @enderror

                    <div class="flex justify-end">
                        <button class="btn btn-primary text-sm" wire:click="store" >Agregar</button>                        
                    </div>
                </div>

                @endif
            </div>

        </div>
    </article>
</div>
