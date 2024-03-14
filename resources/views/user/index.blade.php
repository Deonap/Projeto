<head>
    <title>Utilizadores</title>
    @vite(['resources/js/user/tableResizing.js'])
</head>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 bg-white">
                    <h4 class="font-semibold">Utilizadores</h4>
                    <p class="font-light">Listagem de Utilizadores.</p>
                    <div class="mt-8">
                        <a href="{{route('user.create')}}" class="bg-sky-900 text-white p-2">
                            + Adicionar Utilizador
                        </a>
                    </div>
                    <div class="mt-4">
                        <table class="table table-fixed min-w-full">
                            <thead>
                                <tr class="w-full">
                                    <th class="visible w-[20%]">
                                        Nome
                                    </th>
                                    <th class="sm:visible w-[25%]">
                                        Email
                                    </th>
                                    <th class="md:visible w-[15%]">
                                        Status
                                    </th>
                                    <th class="lg:visible w-[30%]">
                                        Tipo de Acesso
                                    </th>
                                    <th class="xl:visible w-[10%]">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $i => $user)
                                <tr role="row" class="{{$i % 2 == 0 ? " bg-gray-300" : "bg-white" }} h-10 m-auto">
                                    <td class="visible col1">
                                        {{$user->nome}}
                                    </td>
                                    <td class="sm:visible col2">
                                        {{$user->email}}
                                    </td>
                                    <td class="md:visible col3">
                                        {{$user->status}}
                                    </td>
                                    <td class="lg:visible col4">
                                        {{$user->funcoes}}
                                    </td>
                                    <td class="xl:visible col5">
                                        <div class="flex items-center space-x-2">
                                            <!-- botão editar -->
                                            <a href="{{route('user.edit', $user->id)}}" title="Editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bg-sky-900 size-6 p-1 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            <!-- botão remover -->
                                            <form method="POST" action="{{route('user.destroy', $user->id)}}" title="Remover" class="flex items-center m-auto">
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>