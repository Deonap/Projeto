<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Utilizador</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div class="p-5">
        <a href="{{route('user.index')}}" class="bg-sky-900 text-white p-2">
            < Voltar
        </a>
        <h4 class="mt-5 font-semibold">Adicionar Utilizador</h4>
        <p class="font-light">Parametrize os seguintes campos para adicionar um novo Utilizador.</p>

        <form action="{{route('user.store')}}" method="POST">
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
                    <input class="w-full sm:w-11/12 mt-2" type="text" name="nome">
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Email</label>
                    <br>
                    <input class="w-full sm:w-11/12 mt-2" type="text" name="email">
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Password</label>
                    <br>
                    <input class="w-full sm:w-11/12 mt-2" type="password" name="password">
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Telemóvel</label>
                    <br>
                    <input class="w-full sm:w-11/12 mt-2" type="text" name="telemovel">
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Funções</label>
                    <br>
                    <select class="w-full sm:w-11/12 mt-2" name="funcoes">
                        <option value="Administrador">Administrador</option>
                        <option value="Técnico">Técnico</option>
                    </select>
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Status</label>
                    <br>
                    <select class="w-full sm:w-11/12 mt-2" name="status">                        
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
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

</body>