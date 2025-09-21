<x-app-layout>
    <x-slot name="header"><h2>Lista de Usuarios</h2></x-slot>

    <div class="py-6 px-4">
        <a href="{{ route('usuarios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Nuevo Usuario</a>

        <div class="mt-6">
            <table class="w-full table-auto border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->roles->pluck('name')->first() }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="bg-green-500 text-white px-3 py-1 rounded text-sm">Editar</a>
                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?')">
                                @csrf @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
