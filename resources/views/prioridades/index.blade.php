<head>
    <title>Prioridades</title>
    @vite(['resources/js/custom/prioridade/tableResizing.js'])
    @vite(['resources/js/custom/prioridade/searchFilter.js'])
</head>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div>
                    <div class="w-full md:w-3/4 lg:w-1/2 mt-4">                  
                        <label class="font-bold">Responsável</label>
                        <br>
                        <select class="w-full md:w-3/4 lg:w-1/2 mt-2" name="users" id="projectFilter">
                            <option value="0" selected disabled>Selecione um responsável</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-5">
                    <table class="table table-fixed w-full" id="activeProjects">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="5" class="visible text-center text-white w-full">
                                    Projetos ativos
                                </td>
                            </tr>

                            <tr class="w-full h-10">
                                <th class="visible col1">
                                    Nome
                                </th>
                                <th class="sm:visible col2">
                                    Cliente
                                </th>
                                <th class="md:visible col3">
                                    Tipo
                                </th>
                                <th class="lg:visible col4">
                                    Observações
                                </th>
                                <th class="xl:visible col5">
                                    Data Limite
                                </th>
                                <th class="hidden">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Ativo')
                                    <tr role="row" class="h-10 m-auto">
                                        <td class="visible col1">
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="sm:visible col2">
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="md:visible col3">
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="lg:visible col4">
                                            {{$projeto->obs}}
                                        </td>
                                        <?php
                                            $timestampLimite = strtotime($projeto->dataLimite);
                                            $timestampAtual = strtotime(date('Y-m-d'));
                                            $diffTempo = $timestampLimite - $timestampAtual;
                                            $diffDias = ceil($diffTempo / (60 * 60 * 24));

                                            $txtcolor = '';
                                            if ($diffDias < 0) {
                                                $txtcolor = 'text-rose-600';
                                            } elseif ($diffDias < 3) {
                                                $txtcolor = 'text-yellow-600';
                                            }
                                        ?>
                                        <td class="xl:visible col5 {{$txtcolor}}">
                                            <?php
                                                $data = DateTime::createFromFormat('Y-m-d',$projeto->dataLimite);
                                                $dataFormatada = $data->format('d-m-Y');
                                            ?>
                                            {{$dataFormatada}}
                                        </td>
                                        <td class="hidden">
                                            @foreach($projeto->users as $u)
                                                    {{$u->id}}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="mt-[20px]">
                    <table class="table table-fixed w-full mt-5" id="pendingProjects">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="5" class="visible text-center text-white w-full"
                                    >Projetos pendentes
                                </td>
                            </tr>

                            <tr class="w-full h-10">
                                <th class="visible col1">
                                    Nome
                                </th>
                                <th class="sm:visible col2">
                                    Cliente
                                </th>
                                <th class="md:visible col3">
                                    Tipo
                                </th>
                                <th class="lg:visible col4">
                                    Observações
                                </th>
                                <th class="xl:visible col5">
                                    Data Limite
                                </th>
                                <th class="hidden">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Pendente')
                                    <tr role="row" class="h-10 m-auto">
                                        <td class="visible col1">
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="sm:visible col2">
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="md:visible col3">
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="lg:visible col4">
                                            {{$projeto->obs}}
                                        </td>
                                        <?php
                                            $timestampLimite = strtotime($projeto->dataLimite);
                                            $timestampAtual = strtotime(date('Y-m-d'));
                                            $diffTempo = $timestampLimite - $timestampAtual;
                                            $diffDias = ceil($diffTempo / (60 * 60 * 24));

                                            $txtcolor = '';
                                            if ($diffDias < 0) {
                                                $txtcolor = 'text-rose-600';
                                            } elseif ($diffDias < 3) {
                                                $txtcolor = 'text-yellow-600';
                                            }
                                        ?>
                                        <td class="xl:visible col5 {{$txtcolor}}">
                                            <?php
                                                $data = DateTime::createFromFormat('Y-m-d',$projeto->dataLimite);
                                                $dataFormatada = $data->format('d-m-Y');
                                            ?>
                                            {{$dataFormatada}}
                                        </td>
                                        <td class="hidden">
                                            @foreach($projeto->users as $u)
                                                    {{$u->id}}
                                            @endforeach
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