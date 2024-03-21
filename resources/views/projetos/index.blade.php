<head>
    <title>Projetos</title>
    @vite(['resources/js/custom/projeto/tableResizing.js'])
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
                    <div class="w-full sm:w-1/2 mt-4">                  
                        <label class="font-bold">Supervisor</label>
                        <br>
                        <select class="w-full sm:w-1/2 mt-2" name="users" id="projectFilter">
                            <option disabled selected>Selecione um administrador</option>
                            @foreach ($users as $user)
                                @if($user->funcoes == 'Administrador')
                                    <option value="{{$user->id}}">{{$user->nome}}</option>   
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <table class="table table-fixed min-w-full mt-5" id="activeTable">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="6" class="visible text-center text-white w-full">
                                    Projetos em progresso
                                </td>
                            </tr>
                            
                            <tr>
                                <th class="visible w-[20%] col1">
                                    Nome
                                </th>
                                <th class="sm:visible w-[15%] col2">
                                    Cliente
                                </th>
                                <th class="md:visible w-[15%] col3">
                                    Tipo
                                </th>
                                <th class="lg:visible w-[30%] col4">
                                    Observações
                                </th>
                                <th class="xl:visible w-[10%] col5">
                                    Data Limite
                                </th>
                                <th class="xl:visible w-[10%] col6">
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
                                        <td class="xl:visible {{$txtcolor}} col5">
                                            <?php
                                                $data = DateTime::createFromFormat('Y-m-d',$projeto->dataLimite);
                                                $dataFormatada = $data->format('d-m-Y');
                                            ?>
                                            {{$dataFormatada}}
                                        </td>
                                        <td class="xl:visible col6">
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
                <div class="mt-[20px]">
                    <table class="table table-fixed min-w-full" id="finishedTable">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10">
                                <td colspan="6" class="visible text-center text-white">
                                    Projetos terminados
                                </td>
                            </tr>
                            
                            <tr>
                                <th class="visible w-[20%]">
                                    Nome
                                </th>
                                <th class="sm:visible w-[15%]">
                                    Cliente
                                </th>
                                <th class="md:visible w-[15%]">
                                    Tipo
                                </th>
                                <th class="lg:visible w-[30%]">
                                    Observações
                                </th>
                                <th class="xl:visible w-[10%]">
                                    Data terminado
                                </th>
                                <th class="xl:visible w-[10%]">
                                </th>
                                <th class="hidden">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Terminado')
                                    <tr role="row" class="h-10 m-auto">
                                        <td class="visible col1" >
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="sm:visible col2" >
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="md:visible col3" >
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="lg:visible col4" >
                                            {{$projeto->obs}}
                                        </td>
                                        <td class="xl:visible col5" >
                                            {{date_format($projeto->updated_at, 'd-m-Y')}}
                                        </td>
                                        <td class="xl:visible col6" >
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
<script>
    document.querySelectorAll("#activeTable tbody tr").forEach(function(row){
        row.style.display = "none";
        row.classList.add("hidden");
    });
    var i = 0;
    document.querySelectorAll("#finishedTable tbody tr").forEach(function(row){
        row.style.display = "none";
        row.classList.add("hidden");
    });


    document.addEventListener("DOMContentLoaded", function() {
        const projectFilter = document.getElementById("projectFilter");
        const activeTable = document.querySelectorAll("#activeTable tbody tr");
        const finishedTable = document.querySelectorAll("#finishedTable tbody tr");

        projectFilter.addEventListener("change", function() {
            const filterValue = this.value.toLowerCase().trim();
            var i = 0;
            activeTable.forEach(function(row) {
                var cells = row.getElementsByTagName("td");
                var supervisorId = cells[6].textContent.toLowerCase().trim();

                if (supervisorId == filterValue) {
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
        });

        projectFilter.addEventListener("change", function() {
            const filterValue = this.value.toLowerCase().trim();
            var i = 0;
            finishedTable.forEach(function(row) {
                var cells = row.getElementsByTagName("td");
                var supervisorId = cells[6].textContent.toLowerCase().trim();

                if (supervisorId == filterValue) {
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
        });
    });
</script>