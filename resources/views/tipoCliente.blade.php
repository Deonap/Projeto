<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temp</title>
    @vite('resources/css/app.css')
    <style>
        td, th{
            text-align: left;
        }
        td{
            padding-left: 0.5rem;
        }
        th{
            padding: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="max-w-[650px]">
        <div class="grid grid-cols-2 grid-rows-2 gap-x-0 gap-y-[15px]" style="grid-template-areas: 'header header' '. button'">
            <div class="flex text-[rgb(10,57,86)]" style='grid-area: header'>
                <h1 class="font-black">
                    Parametrizações >
                </h1> 
                Tipo de Cliente
            </div>
            <div style='grid-area:button'>
                <a href="#" class="bg-[rgb(0,40,91)] rounded text-white p-2 pl-10 pr-10">
                    Adicionar
                </a>
            </div>
        </div>
        <div class="mt-5 w-fit">
            <table class="table table-fixed w-full">
                <thead>
                    <tr class="w-full bg-gray-400">
                        <th>
                            Tipo
                        </th>
                        <th>
                            Cor
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr role="row" class="h-10 m-auto">
                        <td>
                            Cliente
                        </td>
                        <td>
                            <button class="size-6 bg-blue-500">
                            </button>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <!-- botão editar -->
                                <a href="" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(10,56,70)" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                      </svg>                                      
                                </a>
                                <!-- botão remover -->
                                <form method="POST" action="" title="Remover" class="flex items-center m-auto">
                                    @csrf
                                    @method('delete')
                                    <button type='submit' onclick="return confirm('Tem a certeza?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                          </svg>
                                          
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr role="row" class="h-10 m-auto">
                        <td>
                            Projeto financiado
                        </td>
                        <td>
                            <button class="size-6 bg-orange-500">
                            </button>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <!-- botão editar -->
                                <a href="" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(10,56,70)" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                      </svg>                                      
                                </a>
                                <!-- botão remover -->
                                <form method="POST" action="" title="Remover" class="flex items-center m-auto">
                                    @csrf
                                    @method('delete')
                                    <button type='submit' onclick="return confirm('Tem a certeza?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                          </svg>
                                          
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr role="row" class="h-10 m-auto">
                        <td>
                            Suporte
                        </td>
                        <td>
                            <button class="size-6 bg-green-500">
                            </button>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <!-- botão editar -->
                                <a href="" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(10,56,70)" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                      </svg>                                      
                                </a>
                                <!-- botão remover -->
                                <form method="POST" action="" title="Remover" class="flex items-center m-auto">
                                    @csrf
                                    @method('delete')
                                    <button type='submit' onclick="return confirm('Tem a certeza?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                          </svg>
                                          
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<body>