<title>Projetos</title>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="mt-8">
                    <a href="{{route('projeto.create')}}" class="bg-sky-900 text-white p-2">
                        Adicionar Projeto
                    </a>
                </div>
                <div>
                    <div class="w-full sm:w-1/2 mt-4">                  
                        <label class="font-bold">Supervisor</label>
                        <br>
                        <select class="w-full sm:w-1/2 mt-2" name="users" id="projectFilter">
                            <option value="0" class="text-center">-- Mostrar todos --</option>
                            @foreach ($users as $user)
                                @if($user->funcoes == 'Administrador')
                                    <option value="{{$user->id}}">{{$user->nome}}</option>   
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <table class="table table-fixed min-w-full mt-5 teste" id="inProgressTable">
                        <thead>
                            <tr class="w-full bg-slate-700 h-10"><td colspan="6" class="visible text-center text-white">Projetos em progresso</td></tr>
                            <tr>
                                <th class="visible">
                                    Nome
                                </th>
                                <th class="visible">
                                    Cliente
                                </th>
                                <th class="visible">
                                    Tipo
                                </th>
                                <th class="visible">
                                    Observações
                                </th>
                                <th class="visible">
                                    Data Limite
                                </th>
                                <th class="visible">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Em progresso')
                                    <tr role="row" class="h-10 m-auto">
                                        <td class="visible w-[20%]">
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="visible w-[15%]">
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="visible w-[10%]">
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="visible w-[35%]">
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
                                        <td class="visible {{$txtcolor}} w-[10%]">
                                            {{$projeto->dataLimite}}
                                        </td>
                                        <td class="visible w-[10%]">
                                            <div class="flex items-center space-x-2">
                                                <!-- botão editar -->
                                                <a href="{{route('projeto.edit', $projeto->id)}}" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bg-sky-900 size-6 p-1 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>
                                                <!-- botão remover -->
                                                <form method="POST" action="{{route('projeto.destroy', $projeto->id)}}" title="Remover" class="flex items-center m-auto">
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
                            <tr class="w-full bg-slate-700 h-10"><td colspan="6" class="visible text-center text-white">Projetos terminados</td></tr>
                            <tr>
                                <th class="visible">
                                    Nome
                                </th>
                                <th class="visible">
                                    Cliente
                                </th>
                                <th class="visible">
                                    Tipo
                                </th>
                                <th class="visible">
                                    Observações
                                </th>
                                <th class="visible">
                                    Data terminado
                                </th>
                                <th class="visible">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $projeto)
                                @if($projeto->status == 'Feito')
                                    <tr role="row" class="h-10 m-auto">
                                        <td class='visible w-[20%]'>
                                            {{$projeto->nome}}
                                        </td>
                                        <td class="visible w-[15%]">
                                            {{$projeto->cliente->nome}}
                                        </td>
                                        <td class="visible w-[10%]">
                                            {{$projeto->tipo}}
                                        </td>
                                        <td class="visible w-[35%]">
                                            {{$projeto->obs}}
                                        </td>
                                        <td class="visible w-[10%]">
                                            AAAA
                                        </td>
                                        <td class="visible w-[10%]">
                                            <div class="flex items-center space-x-2">
                                                <!-- botão editar -->
                                                <a href="{{route('projeto.edit', $projeto->id)}}" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bg-sky-900 size-6 p-1 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>
                                                <!-- botão remover -->
                                                <form method="POST" action="{{route('projeto.destroy', $projeto->id)}}" title="Remover" class="flex items-center m-auto">
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
    var i = 0;
    document.querySelectorAll("#inProgressTable tbody tr").forEach(function(row){
        if(i % 2 === 0){
            row.classList.add('bg-gray-300');
        }else{
            row.classList.add('bg-white');
        }
        i++;
    });
    var i = 0;
    document.querySelectorAll("#finishedTable tbody tr").forEach(function(row){
        if(i % 2 === 0){
            row.classList.add('bg-gray-300');
        }else{
            row.classList.add('bg-white');
        }
        i++;
    });


    document.addEventListener("DOMContentLoaded", function() {
        const projectFilter = document.getElementById("projectFilter");
        const inProgressTable = document.querySelectorAll("#inProgressTable tbody tr");
        const finishedTable = document.querySelectorAll("#finishedTable tbody tr");

        projectFilter.addEventListener("change", function() {
            const filterValue = this.value.toLowerCase().trim();
            var flag = filterValue == 0; 
            var i = 0;
            inProgressTable.forEach(function(row) {
                var cells = row.getElementsByTagName("td");
                var supervisorId = cells[6].textContent.toLowerCase().trim();

                if (supervisorId == filterValue || flag) {
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
            var flag = filterValue == 0; 
            var i = 0;
            finishedTable.forEach(function(row) {
                var cells = row.getElementsByTagName("td");
                var supervisorId = cells[6].textContent.toLowerCase().trim();

                if (supervisorId == filterValue || flag) {
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