<x-app-layout>
    <x-slot name="header"><h2>Nuevo Servicio</h2></x-slot>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 400px;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Botón Regresar -->
                <a href="{{ route('servicios.index') }}"
                   class="inline-block mb-6 text-gray-600 hover:text-gray-900 font-medium">
                    &larr; Regresar
                </a>

                <form action="{{ route('servicios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label for="cliente" class="block text-sm font-medium text-gray-700 mb-1">Nombre Servicio</label>
                        <input type="text" name="nombre" placeholder="Nombre" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                    </div>
                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripcion</label>
                        <textarea name="descripcion" placeholder="Descripción" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea><br>
                    </div>
                    <div>
                        <label for="horario" class="block text-sm font-medium text-gray-700 mb-1">Horario</label>
                        <input type="text" name="horario" placeholder="Horario" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                    </div>
                    <div>
                        <input type="file" name="imagen" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                    </div>
                    <button class="bg-green-500 w-full font-bold py-3 px-6 rounded-md shadow-lg focus:outline-none focus:ring-4 focus:ring-green-400 transition duration-150">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
