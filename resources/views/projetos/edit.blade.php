<head>
    <title>Editar Projeto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <style type="text/css">
        .dropdown{
            border:1px solid #6B7280;
            width: 100% !important;
        }
        @media screen and (min-width: 640px) {
        .dropdown {
            width: 91.666667% !important;
        }
        }
        .dropdown-toggle{
            height: 40px !important;
            width: 100% !important;
        }
        .dropdown-item.selected::after {
            content: '\2713';
            font-size: 14px;
            color: green;
        }
    </style>
</head>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <a href="{{route('projetos.index')}}" class="bg-sky-900 text-white p-2 hover:no-underline">
                    < Voltar
                </a>
                <p class="mt-5 font-semibold">Editar Projeto</p>
                <p class="font-light">Parametrize os seguintes campos para editar este Projeto.</p>
                <div>
                    <form action="{{route('projetos.update', $projeto->id)}}" method="POST">
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
                            <input type="hidden" name="id" value="">
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Nome</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="nome" value="{{$projeto->nome}}"/>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Cliente</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="cliente_id">
                                    <option disabled selected>Selecione um cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}" {{$projeto->cliente == $cliente ? 'selected' : '' }}>{{$cliente->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Tipo de Projeto</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="tipo">
                                    <option disabled selected>Selecione o tipo de projeto</option>
                                    <option value="Software" {{$projeto->tipo == 'Software' ? 'selected' : '' }}>Software</option>
                                    <option value="Redes Sociais" {{$projeto->tipo == 'Redes Sociais' ? 'selected' : '' }}>Redes Sociais</option>
                                    <option value="SEO" {{$projeto->tipo == 'SEO' ? 'selected' : '' }}>SEO</option>
                                    <option value="Loja online" {{$projeto->tipo == 'Loja online' ? 'selected' : '' }}>Loja online</option>
                                    <option value="Integração" {{$projeto->tipo == 'Integração' ? 'selected' : '' }}>Integração</option>
                                    <option value="Website" {{$projeto->tipo == 'Website' ? 'selected' : '' }}>Website</option>
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Data Limite</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="date" name="dataLimite" value={{$projeto->dataLimite}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Supervisor</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="supervisor_id">
                                    <option disabled selected>Selecione um Supervisor</option>
                                    @foreach($users as $user)
                                        @if($user->funcoes == "Administrador")
                                            <option value="{{$user->id}}" {{$projeto->Supervisor == $user ? 'selected' : '' }}>{{$user->nome}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Responsáveis</label>
                                <br>
                                <select title="Escolha os responsáveis" class="selectpicker w-full sm:w-11/12 mt-2" multiple data-live-search="true" name="responsaveis_id[]">
                                    @foreach($users as $user)
                                        @if($user->funcoes == "Técnico")
                                            <option value="{{$user->id}}" {{$projeto->users->contains($user) ? 'selected' : '' }}>{{$user->nome}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Orçamento (€)</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" autocomplete="off" type="text" pattern="[1-9]{1}[0-9]{1,8}(\,|\.)[0-9]{2}" name="orcamento" value={{$projeto->orcamento}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Tempo previsto</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" autocomplete="off" pattern="[0-9]{0,4}:[0-5][0-9]" type="text" placeholder="hh:mm" name="tempoPrevisto" value={{$projeto->tempoPrevisto}}>
                            </div>
                            <!-- ocupa completamente meio ecrã + 11/12 da segunda metade. Isso é equivalente a 1/2 + (11/12)*1/2 = 23/24 = 95.8(3)% !-->
                            <div class="w-full sm:w-[95.833333%] mt-4">
                                <label class="font-bold">Observações Gerais</label>
                                <br>
                                <textarea class="w-full mt-2" type="text" name="obs">{{$projeto->obs}}</textarea>
                            </div>
                        </div>
                        <div class="mt-5 ml-20">
                            <button class="bg-sky-900 text-white p-2" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>