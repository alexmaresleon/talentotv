<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/home/slide_01.png') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-black font-bold text-4xl">Bienvenido a TalentoTV</h1>
                <p class="text-black text-lg mt-2 mb-4">-- Tu Comunidad de Aprendizaje --</p>
                <!-- Search box -->
                @livewire('search')
            </div>
        </div>
    </section>

    {{-- Contenido --}}
    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">
            CONTENIDO
        </h1>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
            <article>
                <figure><img class="rounded-xl" src="{{ asset('img/home/img3.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Principiantes</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quod
                    saepe molestias, voluptatibus possimus.</p>
            </article>

            <article>
                <figure><img class="rounded-xl" src="{{ asset('img/home/img2.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Intermedio</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quod
                    saepe molestias, voluptatibus possimus.</p>

            </article>

            <article>
                <figure><img class="rounded-xl" src="{{ asset('img/home/img1.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Avanzados</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quod
                    saepe molestias, voluptatibus possimus.</p>

            </article>

        </div>
    </section>

    {{-- Catalogo de cursos --}}
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">Nuestros Cursos</h1>
        <p class="text-center text-white ">Tenemos un amplio catálogo de cursos</p>
        <div class="flex justify-center mt-2">
            <a href="{{ route('courses.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Ver Catálogo
            </a>
        </div>

    </section>

     {{-- Cursos recientes 8 en portada --}}
    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-700">Cursos recientes</h1>
        <p class="text-center text-gray-600 text-sm mb-6">Todos nuestros cursos estan revisados y actualizados</p>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>

    </section>

    {{-- Footer --}}
    <footer class="mt-24 bg-gray-700 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 text-white">
            <nav class="ml-8">
                INFORMACIÓN
                <ul class="text-sm text-white list-inline">
                    <li class="cursor-pointer">Aviso de privacidad</li>
                    <li class="cursor-pointer">Unete como mentor</li>
                    <li class="cursor-pointer">Soporte</li>
                </ul>
            </nav>
            <nav class="ml-8">
                LINKS
                <ul class="text-sm text-white list-inline">
                    <li class="cursor-pointer">Aviso de privacidad</li>
                    <li class="cursor-pointer">Unete como mentor</li>
                    <li class="cursor-pointer">Soporte</li>
                </ul>
            </nav>
            <nav class="ml-8">
                SOPORTE
                <ul class="text-sm text-white list-inline">
                    <li class="cursor-pointer">Aviso de privacidad</li>
                    <li class="cursor-pointer">Unete como mentor</li>
                    <li class="cursor-pointer">Soporte</li>
                </ul>
            </nav>
            <nav class="ml-8">
                
            </nav>
            <nav class="ml-8">
                <div class="flex justify-center bg-gray-700">
                    <div class="mx-4 order-last">
                        <i class="fab fa-facebook-square cursor-pointer ml-2" style="font-size: 50px"></i>
                        <i class="fab fa-twitter-square cursor-pointer ml-2" style="font-size: 50px"></i>
                        <i class="fab fa-instagram-square cursor-pointer ml-2" style="font-size: 50px"></i>
                    </div>                    
                </div>

            </nav>
        </div>

        <div class="max-w-full text-center bg-gray-700 text-white p-4">
            <div class="text-lg font-bold"> <a class="hover:underline" href="http://talentotv.com.mx/"
                    target="_blank">@TalentoTV</a></div>
        </div>
    </footer>

</x-app-layout>
