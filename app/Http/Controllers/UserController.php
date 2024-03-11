<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index')->with('users', User::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create')->with('users', User::all());
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
        return redirect(route('user.index'));
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
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
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
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'));
    }
}
