<x-app-layout>
    <x-slot name="header"><h2>Nuevo Usuario</h2></x-slot>

    <div class="py-12">
        <div class="mx-auto" style="max-width: 500px;">
            <div class="bg-white p-6 rounded shadow">
                <a href="{{ route('usuarios.index') }}" class="text-gray-600">&larr; Regresar</a>

                <form method="POST" action="{{ route('usuarios.store') }}" class="space-y-4">
                    @csrf

                    <input type="text" name="name" placeholder="Nombre" required class="w-full border px-3 py-2 rounded">
                    <input type="email" name="email" placeholder="Email" required class="w-full border px-3 py-2 rounded">
                    <input type="password" name="password" placeholder="Contraseña" required class="w-full border px-3 py-2 rounded">
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required class="w-full border px-3 py-2 rounded">

                    <select name="role" class="w-full border px-3 py-2 rounded" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>

                    <button class="bg-green-600 text-white w-full py-2 rounded">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
