<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index')->with('users', User::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => 'required',
            'telemovel' => 'nullable',
            'funcoes' => 'nullable',
            'status' => 'nullable',
        ]);

        $user = new User();
        $user->nome = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->telemovel = $request->input('telemovel');
        $user->funcoes = $request->input('funcoes');
        $user->status = $request->input('status');

        $user->save();
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => 'nullable',
            'telemovel' => 'nullable',
            'funcoes' => 'required',
            'status' => 'required',
        ]);

        $user->nome = $request->input('nome');
        $user->email = $request->input('email');

        if($request->input('password') != null){
            $user->password = bcrypt($request->input('password'));
        }

        $user->telemovel = $request->input('telemovel');
        $user->funcoes = $request->input('funcoes');
        $user->status = $request->input('status');

        $user->save();
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
