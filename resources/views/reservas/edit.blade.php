<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Reserva</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 400px;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Botón Regresar -->
                <a href="{{ route('reservas.index') }}"
                   class="inline-block mb-6 text-gray-600 hover:text-gray-900 font-medium">
                    &larr; Regresar
                </a>

                <form action="{{ route('reservas.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="cliente" class="block text-sm font-medium text-gray-700 mb-1">Nombre Cliente</label>
                        <input
                            type="text"
                            id="cliente"
                            name="cliente"
                            required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('cliente', $reserva->cliente ?? '') }}"
                            placeholder="Nombre cliente"
                        >
                        @error('cliente')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                        <input
                            type="date"
                            id="fecha"
                            name="fecha"
                            required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('fecha', $reserva->fecha ?? '') }}"
                        >
                        @error('fecha')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="servicio_id" class="block text-sm font-medium text-gray-700 mb-1">Servicio</label>
                        <select
                            id="servicio_id"
                            name="servicio_id"
                            required
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="" disabled {{ old('servicio_id', $reserva->servicio_id ?? '') == '' ? 'selected' : '' }}>
                                Seleccione un servicio
                            </option>
                            @foreach($servicios as $s)
                                <option value="{{ $s->id }}" {{ old('servicio_id', $reserva->servicio_id ?? '') == $s->id ? 'selected' : '' }}>
                                    {{ $s->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('servicio_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button
                            type="submit"
                            style="background-color: #047857; color: white;"
                            class="w-full font-bold py-3 px-6 rounded-md shadow-lg focus:outline-none focus:ring-4 focus:ring-green-400 transition duration-150"
                        >
                            Guardar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
