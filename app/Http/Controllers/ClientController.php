<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientes.index')->with('clientes', Cliente::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'telemovel' => 'nullable',
            'telefone' => 'nullable',
            'morada' => 'nullable',
            'codigoPostal' => 'nullable',
            'localidade' => 'nullable',
        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->telemovel = $request->input('telemovel');
        $cliente->telefone = $request->input('telefone');
        $cliente->morada = $request->input('morada');
        $cliente->codigoPostal = $request->input('codigoPostal');
        $cliente->localidade = $request->input('localidade');

        $cliente->save();
        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'telemovel' => 'nullable',
            'telefone' => 'nullable',
            'morada' => 'nullable',
            'codigoPostal' => 'nullable',
            'localidade' => 'nullable',
        ]);

        $cliente->nome = $request->input('nome');

        if ($request->input('email') != $cliente->email) {
            $cliente->email = $request->input('email');
        }

        $cliente->telemovel = $request->input('telemovel');
        $cliente->telefone = $request->input('telefone');
        $cliente->morada = $request->input('morada');
        $cliente->codigoPostal = $request->input('codigoPostal');
        $cliente->localidade = $request->input('localidade');

        $cliente->save();
        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect(route('clientes.index'));
    }
}
