<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servicio;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('servicio')->get();
        return view('reservas.index', compact('reservas'));
    }
    public function create()
    {
        $servicios = Servicio::all();
        return view('reservas.create', compact('servicios'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'cliente' => 'required|string|max:100',
            'fecha' => 'required|date',
        ]);
        Reserva::create($data);
        return redirect()->route('reservas.index')->with('success','Reserva creada.');
    }
    public function edit(Reserva $reserva)
    {
        $servicios = Servicio::all();
        return view('reservas.edit', compact('reserva','servicios'));
    }
    public function update(Request $request, Reserva $reserva)
    {
        $data = $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'cliente' => 'required|string|max:100',
            'fecha' => 'required|date',
        ]);
        $reserva->update($data);
        return redirect()->route('reservas.index')->with('success','Reserva actualizada.');
    }
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success','Reserva eliminada.');
    }
    public function show(Reserva $reserva)
{
    return view('reservas.show', compact('reserva'));
}

}
