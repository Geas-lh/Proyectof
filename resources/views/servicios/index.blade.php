<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Servicios</h2>
    </x-slot>

    <div class="py-6 px-4">
        <a href="{{ route('servicios.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">+ Nuevo Servicio</a>
        <div class="mt-6 overflow-x-auto">
            <table class="w-full table-auto border border-gray-300 rounded-lg text-left shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">Nombre</th>
                        <th class="px-4 py-2 border-b">Horario</th>
                        <th class="px-4 py-2 border-b">Imagen</th>
                        <th class="px-4 py-2 border-b">Acciones</th>
                    </tr>
                </thead>
                @foreach($servicios as $s)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $s->nombre }}</td>
                    <td class="px-4 py-2">{{ $s->horario }}</td>
                    <td class="px-4 py-2">
                        @if($s->imagen)
                            <img src="{{ asset('storage/'.$s->imagen) }}" width="80">
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        {{-- Botón Editar --}}
                        <a href="{{ route('servicios.edit', $s) }}" class="inline-block bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                            Editar
                        </a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('servicios.destroy', $s) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">
                                Eliminar
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
