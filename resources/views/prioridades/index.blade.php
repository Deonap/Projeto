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
                        <select class="w-full md:w-3/4 xl:w-1/2 mt-2" name="users" id="projectFilter">
                            <option value="0" selected disabled>Selecione um responsável</option>
                            @foreach ($users as $user)
                                @if($user->funcoes == 'Técnico')
                                    <option value="{{$user->id}}">{{$user->nome}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-5">
                    <table class="table table-fixed w-full" id="activeProjects">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="100" class="table-cell text-center text-white w-full">
                                    Projetos ativos
                                </td>
                            </tr>

                            <tr class="w-full">
                                <td colspan="100" class="table-cell text-center font-black noDataRow">
                                    Sem dados
                                </td>
                            </tr>
                            <tr class="hidden headerRow">
                                <th class="hidden">
                                </th>
                                <th class="table-cell col1">
                                    Prioridade
                                </th>
                                <th class="table-cell col2">
                                    Nome
                                </th>
                                <th class="table-cell col3">
                                    Cliente
                                </th>
                                <th class="sm:table-cell col4">
                                    Tipo
                                </th>
                                <th class="md:table-cell col5">
                                    Observações
                                </th>
                                <th class="lg:table-cell col6">
                                    Tempo investido
                                </th>
                                <th class="lg:table-cell col7">
                                    Tempo previsto
                                </th>
                                <th class="xl:table-cell col8">
                                    Data limite
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Ativo')
                                    <tr role="row" class="h-10 m-auto hidden">
                                        <td class="hidden">
                                            @foreach($projeto->users as $u)
                                                    {{$u->id}}
                                            @endforeach
                                        </td>                                        
                                        <td class="table-cell col1">
                                            1
                                        </td>
                                        <td class="table-cell col2">
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="table-cell col3">
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="sm:table-cell col4">
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="md:table-cell col5">
                                            {{$projeto->obs}}
                                        </td>
                                        <?php
                                            $tempoInvestido = explode(':', $projeto->tempoInvestido);
                                            $tempoPrevisto = explode(':', $projeto->tempoPrevisto);

                                            
                                            $tempoInvestidoH = intval($tempoInvestido[0]);
                                            $tempoInvestidoM = intval($tempoInvestido[1]);

                                            $tempoPrevistoH = intval($tempoPrevisto[0]);
                                            $tempoPrevistoM = intval($tempoPrevisto[1]);
                                            $txTColor = '';
                                            if ($tempoInvestidoH > $tempoPrevistoH) {
                                                $txtColor = 'text-rose-600';
                                            } elseif ($tempoInvestidoH < $tempoPrevistoH) {
                                                $txtColor = 'text-green-600';
                                            } else { // hora igual. comparar minutos
                                                if ($tempoInvestidoM > $tempoPrevistoM) {
                                                    $txtColor = 'text-rose-600';
                                                } elseif ($tempoInvestidoM < $tempoPrevistoM) {
                                                    $txtColor = 'text-green-600';
                                                } else { // tudo igual
                                                    $txtColor = 'text-amber-600';
                                                }
                                            }
                                        ?>
                                        <td class="lg:table-cell col6 {{$txtColor}}">
                                            {{$projeto->tempoInvestido}}
                                        </td>
                                        <td class="lg:table-cell col7">
                                            {{$projeto->tempoPrevisto}}
                                        </td>
                                        <td class="xl:table-cell col8">
                                            <?php
                                                $data = DateTime::createFromFormat('Y-m-d',$projeto->dataLimite);
                                                $dataFormatada = $data->format('d-m-Y');
                                            ?>
                                            {{$dataFormatada}}
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
                                <td colspan="100" class="table-cell text-center text-white w-full"
                                    >Projetos pendentes
                                </td>
                            </tr>

                            <tr class="w-full">
                                <td colspan="100" class="table-cell text-center font-black noDataRow">
                                    Sem dados
                                </td>
                            </tr>
                            <tr class="hidden headerRow">
                                <th class="hidden">
                                </th>
                                <th class="table-cell col1">
                                    Prioridade
                                </th>
                                <th class="table-cell col2">
                                    Nome
                                </th>
                                <th class="table-cell col3">
                                    Cliente
                                </th>
                                <th class="sm:table-cell col4">
                                    Tipo
                                </th>
                                <th class="md:table-cell col5">
                                    Observações
                                </th>
                                <th class="lg:table-cell col6">
                                    Tempo investido
                                </th>
                                <th class="lg:table-cell col7">
                                    Tempo previsto
                                </th>
                                <th class="xl:table-cell col8">
                                    Data limite
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Pendente')
                                    <tr role="row" class="h-10 m-auto hidden">
                                        <td class="hidden">
                                            @foreach($projeto->users as $u)
                                                    {{$u->id}}
                                            @endforeach
                                        </td>                                        
                                        <td class="table-cell col1">
                                            1
                                        </td>
                                        <td class="table-cell col2">
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="table-cell col3">
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="sm:table-cell col4">
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="md:table-cell col5">
                                            {{$projeto->obs}}
                                        </td>
                                        <td class="lg:table-cell col6">
                                            {{$projeto->tempoInvestido}}
                                        </td>
                                        <td class="lg:table-cell col7">
                                            {{$projeto->tempoPrevisto}}
                                        </td>
                                        <td class="xl:table-cell col8">
                                            <?php
                                                $data = DateTime::createFromFormat('Y-m-d',$projeto->dataLimite);
                                                $dataFormatada = $data->format('d-m-Y');
                                            ?>
                                            {{$dataFormatada}}
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