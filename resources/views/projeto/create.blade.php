<title>Adicionar Projeto</title>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5">
                    <a href="{{route('projeto.index')}}" class="bg-sky-900 text-white p-2">
                        < Voltar
                    </a>
                    <p class="mt-5 font-semibold">Adicionar Projeto</p>
                    <p class="font-light">Parametrize os seguintes campos para adicionar um novo Projeto.</p>

                    <form action="{{route('projeto.store')}}" method="POST">
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
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Nome</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="nome"/>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Cliente</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="cliente_id">
                                    <option disabled selected>Selecione um cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Tipo de Projeto</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="tipo">
                                    <option disabled selected>Selecione o tipo de projeto</option>
                                    <option value="Software">Software</option>
                                    <option value="Redes Sociais">Redes Sociais</option>
                                    <option value="SEO">SEO</option>
                                    <option value="Loja online">Loja online</option>
                                    <option value="Integração">Integração</option>
                                    <option value="Website">Website</option>
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Data Limite</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="date" min={{date('Y-m-d')}} name="dataLimite">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Supervisor</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="supervisor_id">
                                    <option disabled selected>Selecione um Supervisor</option>
                                    @foreach($users as $user)
                                    @if($user->funcoes == "Administrador")
                                    <option value="{{$user->id}}">{{$user->nome}}</option>
                                @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Responsável</label>
                                <br>
                                <select class="w-full sm:w-11/12 mt-2" name="responsavel_id">
                                    <option disabled selected>Selecione um Responsável</option>
                                    @foreach($users as $user)
                                        @if($user->funcoes == "Técnico")
                                            <option value="{{$user->id}}">{{$user->nome}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- ocupa completamente meio ecrã + 11/12 da segunda metade. Isso é equivalente a 1/2 + (11/12)*1/2 = 23/24 = 95.8(3)% !-->
                            <div class="w-full sm:w-[95.833333%] mt-4">
                                <label class="font-bold">Observações Gerais</label>
                                <br>
                                <textarea class="w-full mt-2" type="text" name="obs"></textarea>
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