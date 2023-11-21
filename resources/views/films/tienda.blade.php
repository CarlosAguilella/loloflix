<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir Créditos a tu Monedero') }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="mb-4">
                <div class="bg-gray-300 p-4 rounded-md">
                    <p class="text-gray-800 text-lg font-semibold mb-2">Añadir Créditos</p>
                    <p class="text-gray-600">Añade créditos de 10 en 10 a tu monedero para disfrutar de más compras.</p>
                    <a href="{{ route('profile.monedero.add') }}" class="block mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 mb-3 rounded">
                        Añadir 10 créditos
                    </a>
                    <p class="text-gray-600">Se cobrará instantaneamente a la tarjeta asociada con la cuenta, en caso de no poder realizarlo, se anulará la suscripción.</p>
                </div>
            </div>
            <div class="mb-4">
                <div class="bg-gray-300 p-4 rounded-md">
                    <p class="text-gray-800 text-lg font-semibold mb-2">Tu Monedero</p>
                    <p class="text-gray-600">Tienes <span class="text-red-500">{{ Auth::user()->monedero }}</span> créditos en tu monedero.</p>
                    <p class="text-gray-600">Si tienes algún problema, contacta con nosotros.</p>
                    <p class="text-gray-600">Recuerda que puedes cancelar tu suscripción en cualquier momento.</p>

                </div>
            </div>
            <div class="mb-4">
                <div class="bg-gray-300 p-4 rounded-md">
                    <p class="text-gray-800 text-lg font-semibold mb-2">Instrucciones</p>
                    <ul class="list-disc text-gray-600 pl-4">
                        <li>Puedes añadir créditos pagando con tarjeta de crédito.</li>
                        <li>Los créditos se sumarán automáticamente a tu monedero.</li>
                        <li>Disfruta de una experiencia de compra fácil y rápida.</li>
                    </ul>
                </div>
            </div>
            <div class="mb-4">
                <div class="bg-gray-300 p-4 rounded-md">
                    <p class="text-gray-800 text-lg font-semibold mb-2">Preguntas Frecuentes</p>
                    <ul class="list-disc text-gray-600 pl-4">
                        <li>¿Qué pasa si cancelo mi suscripción?</li>
                        <li>¿Qué pasa si no tengo suficientes créditos para comprar una película?</li>
                        <li>¿Qué pasa si no puedo pagar con tarjeta de crédito?</li>
                    </ul>
                </div>
            </div>
            <div class="mb-4">
                <div class="bg-gray-300 p-4 rounded-md">
                    <p class="text-gray-800 text-lg font-semibold mb-2">Contacto</p>
                    <p class="text-gray-600">Si tienes algún problema, contacta con nosotros.</p>
                </div>
        </div>
    </div>
</x-app-layout>
