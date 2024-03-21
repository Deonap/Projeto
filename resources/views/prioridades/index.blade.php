<head>
    <title>Prioridades</title>
    @vite(['resources/js/custom/projeto/tableResizing.js'])
</head>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div>
                    <div class="w-full sm:w-1/2 mt-4">                  
                        <label class="font-bold">Responsável</label>
                        <br>
                        <select class="w-full sm:w-1/2 mt-2" name="users" id="projectFilter">
                            <option value="0" selected disabled>Selecione um responsável</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <table class="table table-fixed min-w-full mt-5" id="activeProjects">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="6" class="visible text-center text-white w-full">
                                    Projetos ativos
                                </td>
                            </tr>

                            <tr>
                                <th class="visible w-[20%] col1">
                                    Nome
                                </th>
                                <th class="sm:visible w-[20%] col2">
                                    Cliente
                                </th>
                                <th class="md:visible w-[15%] col3">
                                    Tipo
                                </th>
                                <th class="lg:visible w-[30%] col4">
                                    Observações
                                </th>
                                <th class="xl:visible w-[15%] col5">
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
                    <table class="table table-fixed min-w-full mt-5 teste" id="pendingProjects">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="6" class="visible text-center text-white w-full"
                                    >Projetos pendentes
                                </td>
                            </tr>

                            <tr>
                                <th class="visible w-[20%] col1">
                                    Nome
                                </th>
                                <th class="sm:visible w-[20%] col2">
                                    Cliente
                                </th>
                                <th class="md:visible w-[15%] col3">
                                    Tipo
                                </th>
                                <th class="lg:visible w-[30%] col4">
                                    Observações
                                </th>
                                <th class="xl:visible w-[15%] col5">
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
<script>
    document.querySelectorAll("#activeProjects tbody tr").forEach(function(row){
        row.style.display = "none";
        row.classList.add("hidden");
    });
    document.querySelectorAll("#pendingProjects tbody tr").forEach(function(row){
        row.style.display = "none";
        row.classList.add("hidden");
    });

    document.addEventListener("DOMContentLoaded", function(){
        const projectFilter = document.getElementById("projectFilter");
        const activeProjects = document.querySelectorAll("#activeProjects tbody tr");
        const pendingProjects = document.querySelectorAll("#pendingProjects tbody tr");

        projectFilter.addEventListener("change", function(){
            const filterValue = this.value.toLowerCase().trim();
            var i = 0;
            activeProjects.forEach(function(row) {
                var cells = row.getElementsByTagName("td");
                var responsaveis_id = cells[5].textContent.toLowerCase()
                    .split('\n').map(function(item) {
                        return item.trim();
                    }).filter(function(item) {
                        return item !== '';
                    });
                if (responsaveis_id.includes(filterValue)) {
                    if (i % 2 === 0){
                        row.classList.remove('bg-white');
                        row.classList.add('bg-gray-300');
                    }else{
                        row.classList.remove('bg-gray-300');
                        row.classList.add('bg-white');
                    }
                    i++;
                    row.style.display = "";
                    row.classList.remove("hidden");
                } else {
                    row.style.display = "none";
                    row.classList.add("hidden");
                }
            });
            var u = 0;
            pendingProjects.forEach(function(row) {
                var cells = row.getElementsByTagName("td");
                var responsaveis_id = cells[5].textContent.toLowerCase()
                    .split('\n').map(function(item) {
                        return item.trim();
                    }).filter(function(item) {
                        return item !== '';
                    });
                if (responsaveis_id.includes(filterValue)) {
                    if (u % 2 === 0){
                        row.classList.remove('bg-white');
                        row.classList.add('bg-gray-300');
                    }else{
                        row.classList.remove('bg-gray-300');
                        row.classList.add('bg-white');
                    }
                    u++;
                    row.style.display = "";
                    row.classList.remove("hidden");
                } else {
                    row.style.display = "none";
                    row.classList.add("hidden");
                }
            });
        });        
    });
</script>