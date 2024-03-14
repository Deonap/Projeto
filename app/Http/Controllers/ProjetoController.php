<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Cliente;
use App\Models\UserTask;
use App\Models\User;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("projeto.index")->with("projetos", Projeto::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("projeto.create")->with(['clientes' => Cliente::All(), 'users' => User::where('status', 'Ativo')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'cliente_id' => 'required',
            'tipo' => 'required',
            'dataLimite' => 'required',
            'supervisor_id' => 'required',
            'obs' => 'nullable',
        ]);

        $project = new Projeto();
        $project->nome = $request->input('nome');
        $project->cliente_id = $request->input('cliente_id');
        $project->tipo = $request->input('tipo');
        $project->dataLimite = $request->input('dataLimite');
        $project->supervisor_id = $request->input('supervisor_id');
        $project->obs = $request->input('obs');

        $project->save();


        $validated = $request->validate([
            'responsaveis_id' => 'array',
        ]);

        foreach ($request->input('responsaveis_id') as $value) {
            $userTask = new UserTask();
            $userTask->projeto_id = $project->id;
            $userTask->utilizador_id = $value;
            $userTask->save();
        }

        return redirect(route('projeto.index'));
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
        dd($projeto);
        return view('projeto.edit')->with('projeto', $projeto);
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
        dd($projeto);
        $projeto->delete();
        return redirect(route('projeto.index'));
    }
}
