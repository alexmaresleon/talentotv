<x-app-layout>

    @php
        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        
        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Curso: ' . $course->title;
        $item->quantity = 1;
        $item->unit_price = $course->price->value;
        $preference->back_urls = [
            'success' => route('payment.approved', $course),
            'failure' => route('payment.checkout', $course),
            'pending' => route('payment.checkout', $course),
        ];
        $preference->auto_return = 'approved';
        $preference->items = [$item];
        $preference->save();
    @endphp

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                    <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                    <p class="text-xl font-bold ml-auto">{{ $course->price->name }}</p>
                </article>

                <div class="cho-container flex justify-end mt-2 mb-4"></div>

                <hr>
                <p class="text-sm mt-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet unde quae quos
                    voluptatum recusandae, porro velit obcaecati magni magnam sequi perspiciatis minima. Incidunt cum
                    minus saepe perferendis vel est veniam.
                    <a class="font-bold" href="">Terminos y condiciones</a>
                </p>
            </div>
        </div>
    </div>

    {{-- SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    {{-- Funcionalidad --}}
    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: 'es-MX'
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                label: 'Pagar este curso', // Cambia el texto del botón de pago (opcional)
            }
        });
    </script>


</x-app-layout>
