<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/cursos/slide_02.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">TalentoTV</h1>
                <p class="text-white text-lg mt-1 mb-4">Tu plataforma educativa</p>
                <!-- Search box -->
                @livewire('search')
            </div>
        </div>
    </section>

    @livewire('courses-index')

</x-app-layout>