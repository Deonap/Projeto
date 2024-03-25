<head>
    <title>Projetos</title>
    @vite(['resources/js/custom/projeto/tableResizing.js'])
    @vite(['resources/js/custom/projeto/searchFilter.js'])
</head>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="mt-8">
                    <a href="{{route('projetos.create')}}" class="bg-sky-900 text-white p-2">
                        Adicionar Projeto
                    </a>
                </div>
                <div>
                    <div class="w-full md:w-3/4 lg:w-1/2 mt-4">                  
                        <label class="font-bold">Supervisor</label>
                        <br>
                        <select class="w-full md:w-3/4 xl:w-1/2 mt-2" name="users" id="projectFilter">
                            <option disabled selected>Selecione um administrador</option>
                            @foreach ($users as $user)
                                @if($user->funcoes == 'Administrador')
                                    <option value="{{$user->id}}">{{$user->nome}}</option>   
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-5">
                    <table class="table table-fixed w-full" id="activeTable">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="100" class="table-cell text-center text-white w-full">
                                    Projetos em progresso
                                </td>
                            </tr>
                            
                            <tr class="w-full">
                                <td colspan="100" class="table-cell text-center font-black noDataRow">
                                    Sem dados
                                </td>
                            </tr>
                            <tr class="hidden headerRow">
                                <th class="table-cell col1">
                                    Nome
                                </th>
                                <th class="table-cell col2">
                                    Cliente
                                </th>
                                <th class="sm:table-cell col3">
                                    Tipo
                                </th>
                                <th class="md:table-cell col4">
                                    Observações
                                </th>
                                <th class="lg:table-cell col5">
                                    Tempo investido
                                </th>
                                <th class="lg:table-cell col6">
                                    Tempo previsto
                                </th>
                                <th class="xl:table-cell col7">
                                    Data limite
                                </th>
                                <th class="xl:table-cell col8">
                                </th>
                                <th class="hidden">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Ativo')
                                    <tr role="row" class="h-10 m-auto hidden">
                                        <td class="table-cell col1">
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="table-cell col2">
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="sm:table-cell col3">
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="md:table-cell col4">
                                            {{$projeto->obs}}
                                        </td>
                                        <td class="lg:table-cell col5">
                                            {{$projeto->tempoInvestido}}
                                        </td>
                                        <td class="lg:table-cell col6">
                                            {{$projeto->tempoPrevisto}}
                                        </td>
                                        <td class="xl:table-cell col7">
                                            <?php
                                                $data = DateTime::createFromFormat('Y-m-d',$projeto->dataLimite);
                                                $dataFormatada = $data->format('d-m-Y');
                                            ?>
                                            {{$dataFormatada}}
                                        </td>
                                        <td class="xl:table-cell col8">
                                            <div class="flex items-center space-x-2">
                                                <!-- botão editar -->
                                                <a href="{{route('projetos.edit', $projeto->id)}}" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bg-sky-900 size-6 p-1 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>
                                                <!-- botão remover -->
                                                <form method="POST" action="{{route('projetos.destroy', $projeto->id)}}" title="Remover" class="flex items-center m-auto">
                                                    @csrf
                                                    @method('delete')
                                                    <button type='submit' onclick="return confirm('Tem a certeza?')" class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bg-red-800 size-6 p-1 text-white">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="hidden">
                                            {{$projeto->Supervisor->id}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="mt-[15px]">
                    <table class="table table-fixed w-full" id="finishedTable">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="100" class="table-cell text-center text-white w-full">
                                    Projetos terminados
                                </td>
                            </tr>

                            <tr class="w-full">
                                <td colspan="100" class="table-cell text-center font-black noDataRow">
                                    Sem dados
                                </td>
                            </tr>
                            <tr class="hidden headerRow">
                                <th class="table-cell col1_2">
                                    Nome
                                </th>
                                <th class="sm:table-cell col2_2">
                                    Cliente
                                </th>
                                <th class="md:table-cell col3_2">
                                    Tipo
                                </th>
                                <th class="lg:table-cell col4_2">
                                    Observações
                                </th>
                                <th class="xl:table-cell col5_2">
                                    Data terminado
                                </th>
                                <th class="xl:table-cell col6_2">
                                </th>
                                <th class="hidden">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Terminado')
                                    <tr role="row" class="h-10 m-auto hidden">
                                        <td class="table-cell col1_2" >
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="sm:table-cell col2_2" >
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="md:table-cell col3_2" >
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="lg:table-cell col4_2" >
                                            {{$projeto->obs}}
                                        </td>
                                        <td class="xl:table-cell col5_2" >
                                            {{date_format($projeto->updated_at, 'd-m-Y')}}
                                        </td>
                                        <td class="xl:table-cell col6_2" >
                                            <div class="flex items-center space-x-2">
                                                <!-- botão editar -->
                                                <a href="{{route('projetos.edit', $projeto->id)}}" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bg-sky-900 size-6 p-1 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>
                                                <!-- botão remover -->
                                                <form method="POST" action="{{route('projetos.destroy', $projeto->id)}}" title="Remover" class="flex items-center m-auto">
                                                    @csrf
                                                    @method('delete')
                                                    <button type='submit' onclick="return confirm('Tem a certeza?')" class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bg-red-800 size-6 p-1 text-white">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="hidden">
                                            {{$projeto->Supervisor->id}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>