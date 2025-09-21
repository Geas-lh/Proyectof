<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }
    public function create()
    {
        return view('servicios.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'horario' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
            ]);
            if ($request->hasFile('imagen'))
            {
                $data['imagen'] = $request->file('imagen')->store('servicios','public');
            }
        Servicio::create($data);
        return redirect()->route('servicios.index')->with('success','Servicio creado.');
    }
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }
    public function update(Request $request, Servicio $servicio)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'horario' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
            ]);
            if ($request->hasFile('imagen'))
            {
			    $data['imagen'] = $request->file('imagen')->store('servicios','public');
            }
        $servicio->update($data);
        return redirect()->route('servicios.index')->with('success','Servicio actualizado.');
    }
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success','Servicio eliminado.');
    }
}
