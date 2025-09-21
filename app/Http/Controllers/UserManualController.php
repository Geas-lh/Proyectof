<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManualController extends Controller
{
    public function index()
    {
        return view('usuarios.index', [
            'users' => User::with('roles')->get()
        ]);
    }

    public function create()
    {
        // Solo permitir roles 'admin' y 'usuario'
        $roles = Role::whereIn('name', ['admin', 'usuario'])->get();

        return view('usuarios.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:admin,usuario',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $usuario)
    {
        $roles = Role::whereIn('name', ['admin', 'usuario'])->get();

        return view('usuarios.edit', [
            'user' => $usuario,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role'     => 'required|in:admin,usuario',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        // Solo actualizar la contraseña si fue proporcionada
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        $usuario->syncRoles([$request->role]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
