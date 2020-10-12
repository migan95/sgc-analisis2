<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index')
            ->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
        ]);

        Cliente::create($request->all());

        return redirect()
            ->route('clientes.index')
            ->with('mensaje','Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show')
            ->with('cliente',$cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit')
            ->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request-> validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
        ]);

        $cliente->update($request->all());

        return redirect()
            ->route('clientes.index')
            ->with('mensaje', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('mensaje', 'Cliente eliminado correctamente');
    }
}
