<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\User;
use Illuminate\Http\Request;

class PrioridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prioridades.index')->with(['projetos' => Projeto::all(), 'users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Projeto $projeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projeto $projeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projeto $projeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projeto $projeto)
    {
        //
    }
}
