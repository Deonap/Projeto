<title>Adicionar Utilizador</title>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <a href="{{route('users.index')}}" class="bg-sky-900 text-white p-2">
                    < Voltar
                </a>
                <h4 class="mt-5 font-semibold">Adicionar Utilizador</h4>
                <p class="font-light">Parametrize os seguintes campos para adicionar um novo Utilizador.</p>
                <div>
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        
                        @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif

                        <div class="flex flex-wrap">
                            <input type="hidden" name="id">
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Nome</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="nome" value={{old('nome')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Email</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="email" value={{old('email')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Password</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="password" name="password">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Telemóvel</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="telemovel" value={{old('telemovel')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Funções</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="funcoes">
                                    <option value="Administrador" {{old('funcoes') == 'Administrador' ? 'selected' : ''}}>Administrador</option>
                                    <option value="Técnico" {{old('funcoes') == 'Técnico' ? 'selected' : ''}}>Técnico</option>
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Status</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="status">                        
                                    <option value="Ativo" {{old('status') == 'Ativo' ? 'selected' : ''}}>Ativo</option>
                                    <option value="Inativo" {{old('status') == 'Inativo' ? 'selected' : ''}}>Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5 ml-20">
                            <button class="bg-sky-900 text-white p-2" type="submit">
                                Adicionar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>  