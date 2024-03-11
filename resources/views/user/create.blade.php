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
            <i class="mdi mdi-plus"></i>< Voltar
        </a>
        <h4 class="mt-0 header-title">Adicionar Utilizador</h4>
        <p class="text-muted m-b-30 font-14">Parametrize os seguintes campos para adicionar um novo Utilizador.</p>

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
                <input type="hidden" name="id" value="">
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Nome</label>
                    <br>
                    <input class="w-3/4" type="text" name="nome" value="">
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Email</label>
                    <br>
                    <input class="w-3/4" type="text" name="email" value="">
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Password</label>
                    <br>
                    <input class="w-3/4" type="password" name="password">
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
                        <option value="Administrador">Administrador</option>
                        <option value="Técnico">Técnico</option>
                    </select>
                </div>
                <div class="form-group col-md-6 w-1/2">
                    <label class="font-bold">Status</label>
                    <br>
                    <select class="w-3/4" name="status">                        
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 offset-2">
                    <button class="bg-sky-900 text-white p-2" type="submit">
                        Adicionar
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>