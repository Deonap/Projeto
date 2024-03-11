<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Utilizador</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div class="p-5">
        <a href="{{route('user.index')}}" class="bg-sky-900 text-white p-2">
            < Voltar
        </a>
        <h4 class="font-semibold">Editar Utilizador</h4>
        <p class="font-light">Parametrize os seguintes campos para editar o perfil deste Utilizador.</p>

        <form action="{{route('user.update', $user->id)}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')

            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif

            <div class="flex flex-wrap">
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Nome</label>
                    <br>
                    <input class="w-full sm:w-11/12 mt-2" type="text" name="nome" value="{{$user->nome}}">
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Email</label>
                    <br>
                    <input class="w-full sm:w-11/12 mt-2" type="text" name="email" value="{{$user->email}}">
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Password</label>
                    <br>
                    <input class="w-full sm:w-11/12 mt-2" type="password" name="password"
                        placeholder="Preencher apenas se pretender alterar a password!">
                </div>
                <div class="w-full sm:w-1/2 mt-4">
                    <label class="font-bold">Telemóvel</label>
                    <br>
                    <input class="w-full sm:w-11/12 mt-2" type="text" name="telemovel" value="{{$user->telemovel}}">
                </div>
                <div class="w-full sm:w-1/2" mt-4>
                    <label class="font-bold">Funções</label>
                    <br>
                    <select class="w-full sm:w-11/12 mt-2" name="funcoes">
                        <option value="Administrador" @if ($user->funcoes == 'Administrador') selected @endif >Administrador</option>
                        <option value="Técnico" @if($user->funcoes == 'Técnico') selected @endif >Técnico</option>
                    </select>
                </div>
                <div class="w-full sm:w-1/2" mt-4>
                    <label class="font-bold">Status</label>
                    <br>
                    <select class="w-full sm:w-11/12 mt-2" name="status">                        
                        <option value="Ativo" @if ($user->status == 'Ativo') selected @endif >Ativo</option>
                        <option value="Inativo" @if ($user->status == 'Inativo') selected @endif >Inativo</option>
                    </select>
                </div>
            </div>
            <div class="mt-5 ml-20">
                <button class="bg-sky-900 text-white p-2" type="submit">
                    Guardar
                </button>
            </div>
        </form>
    </div>

</body>