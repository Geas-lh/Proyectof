<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de Control
        </h2>
    </x-slot>

    <div class="py-10 px-6">
        @role('admin')
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-dashboard-card 
                    title="Reservas"
                    description="Ver y gestionar reservas"
                    route="reservas.index"
                    color="blue" />

                <x-dashboard-card 
                    title="Servicios"
                    description="Gestionar los servicios ofrecidos"
                    route="servicios.index"
                    color="green" />

                <x-dashboard-card 
                    title="Usuarios"
                    description="Administrar usuarios y roles"
                    route="usuarios.index"
                    color="indigo" />
            </div>
        @else
            <div class="bg-gray-100 shadow-md rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Bienvenido, {{ Auth::user()->name }}</h3>
                <p class="text-gray-700 mb-4">
                    Puedes ver tus reservas activas o solicitar nuevos servicios.
                </p>
                <div class="flex flex-col gap-4">
                    <a href="{{ route('reservas.index') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-1 px-2 rounded shadow-sm text-center transition duration-200">
                        Ver Mis Reservas
                    </a>    

                </div> {{-- Cierra el div flex --}}
            </div> {{-- Cierra el contenedor bg-gray-100 --}}
        @endrole
    </div>
</x-app-layout>
