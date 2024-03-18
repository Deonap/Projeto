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
        return view("projeto.index")->with(["projetos" => Projeto::all(),"users" => User::all()]);
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

        $projeto = new Projeto();
        $projeto->nome = $request->input('nome');
        $projeto->cliente_id = $request->input('cliente_id');
        $projeto->tipo = $request->input('tipo');
        $projeto->dataLimite = $request->input('dataLimite');
        $projeto->supervisor_id = $request->input('supervisor_id');
        $projeto->obs = $request->input('obs');
        $projeto->status = 'Por fazer';

        $projeto->save();


        $validated = $request->validate([
            'responsaveis_id' => 'array',
        ]);

        foreach ($request->input('responsaveis_id') as $value) {
            $userTask = new UserTask();
            $userTask->projeto_id = $projeto->id;
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
        return view('projeto.edit')->with(['projeto' => $projeto, 'clientes' => Cliente::all(), 'users' => User::where('status', 'Ativo')->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projeto $projeto)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'cliente_id' => 'required',
            'tipo' => 'required',
            'dataLimite' => 'required',
            'supervisor_id' => 'required',
            'responsaveis_id' => 'array',
            'obs' => 'nullable',
        ]);

        $projeto->nome = $request->input('nome');
        $projeto->cliente_id = $request->input('cliente_id');
        $projeto->tipo = $request->input('tipo');
        $projeto->dataLimite = $request->input('dataLimite');
        $projeto->supervisor_id = $request->input('supervisor_id');
        $projeto->obs = $request->input('obs');

        $projeto->save();

        $responsaveis = User::whereIn('id', function ($query) use ($projeto) {
            $query->select('utilizador_id')
                ->from('user_tasks')
                ->where('projeto_id', $projeto->id);
        })->get();

        foreach ($responsaveis as $r) {
            if (in_array($r, $request->input('responsaveis_id')) && count($responsaveis) === count($request->input('responsaveis_id'))) {
                continue;
            } else {
                foreach (UserTask::where('projeto_id', $projeto->id)->get() as $temp) {
                    $temp->delete();
                }
                foreach ($request->input('responsaveis_id') as $value) {
                    $userTask = new UserTask();
                    $userTask->projeto_id = $projeto->id;
                    $userTask->utilizador_id = $value;
                    $userTask->save();
                }
                break;
            }
        }
        $projeto->save();
        return redirect(route('projeto.index'));
    }

    public function updateStatus(Projeto $projeto, string $status)
    {
        $projeto->status = $status;
        $projeto->save();
        return redirect(route('projeto.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projeto $projeto)
    {
        $projeto->delete();
        return redirect(route('projeto.index'));
    }
}