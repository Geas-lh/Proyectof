<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuario
        </h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <a href="{{ route('usuarios.index') }}" class="text-gray-600 mb-4 inline-block">&larr; Regresar</a>

        <form method="POST" action="{{ route('usuarios.update', $user->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{ $user->name }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" value="{{ $user->email }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label for="role">Rol</label>
                    <select name="role" class="w-full border px-3 py-2 rounded">
                        @foreach($roles as $rol)
                            @if(in_array($rol->name, ['admin', 'usuario'])) {{-- Solo admin y usuario --}}
                                <option value="{{ $rol->name }}" {{ $user->hasRole($rol->name) ? 'selected' : '' }}>
                                    {{ ucfirst($rol->name) }}
                                </option>
                            @endif
                        @endforeach
                    </select>

            </div>

            <div>
                <button class="bg-green-600 text-white font-bold px-4 py-2 rounded">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
