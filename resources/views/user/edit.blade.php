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
            <i class="mdi mdi-plus"></i>Voltar
        </a>
        <h4 class="mt-0 header-title">Editar Utilizador</h4>
        <p class="text-muted m-b-30 font-14">Parametrize os seguintes campos para editar o perfil deste Utilizador.</p>

        <form method="POST" action="{{route('user.update', $user->id)}}" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap">
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Nome</label>
                    <br>
                    <input class="w-3/4" type="text" name="nome" value="{{$user->nome}}">
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Email</label>
                    <br>
                    <input class="w-3/4" type="text" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Password</label>
                    <br>
                    <input class="w-3/4" type="password" name="password"
                        placeholder="Preencher apenas se pretender alterar a password!">
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Telemóvel</label>
                    <br>
                    <input class="w-3/4" type="text" name="telemovel">
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Funções</label>
                    <br>
                    <select class="w-3/4" name="funcoes">
                        <option value="Administrador" @if ($user->funcoes == 'Administrador') selected @endif >Administrador</option>
                        <option value="Técnico" @if($user->funcoes == 'Técnico') selected @endif >Técnico</option>
                    </select>
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Status</label>
                    <br>
                    <select class="w-3/4" name="status">                        
                        <option value="Ativo" @if ($user->status == 'Ativo') selected @endif >Ativo</option>
                        <option value="Inativo" @if ($user->status == 'Inativo') selected @endif >Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 offset-2">
                    <button class="bg-sky-900 text-white p-2" type="submit">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>