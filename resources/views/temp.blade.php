<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temp</title>
    @vite('resources/css/app.css')
    <style>
        .defaultDashboard{
            width: fit-content;
            height: fit-content;
            --tw-text-opacity: 1;
            color: rgb(255 255 255);
            padding: 1.25rem;
            padding-bottom: 2.5rem;
            background-color: rgb(10 57 86);
            border-radius: 1rem;
            margin:50px;
        }
        .categoryHeaderContainer{
            display:flex;
            align-items:center;
            margin-top:0.5rem;
        }
        .categoryHeaderIcon{
            width: 1.25rem;
            height: 1.25rem;
        }
        .categoryHeaderTitle{
            padding-left: 4px;
            font-weight: 700;
            cursor:default;
        }
        .categoryContentContainer{
            display: flex;
            flex-direction: column;
            font-weight: 300;
            margin-top: 0.25rem;
            margin-left: 0.75rem;
        }
        .categoryContent:hover{
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255);
            color: rgb(10 57 86);
            border-radius: 0.25rem;
            cursor:pointer;
        }
        .categoryContent{
            font-weight: 300;
            color:white;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="flex items-center">
        <div class="defaultDashboard">
                <div>
                    INSERIR IMAGEM
                </div>
                <div class="categoryHeaderContainer">
                    <div class="categoryHeaderIcon">
                        <!-- Ícone não encontrado -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="categoryHeaderTitle">
                        Prioridades
                    </div>
                </div>
                <div class="categoryContentContainer">
                    <x-nav-link href="" class="categoryContent">
                        - Definir
                    </x-nav-link>
                    <x-nav-link href="" class="categoryContent">
                        - Histórico
                    </x-nav-link>
                </div>
            <div class="categoryContainer">
                <div class="categoryHeaderContainer">
                    <div class="categoryHeaderIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="categoryHeaderTitle">
                        Clientes
                    </div>
                </div>
                <div class="categoryContentContainer">
                    <x-nav-link href="" class="categoryContent">
                        - Adicionar
                    </x-nav-link>
                    <x-nav-link href="" class="categoryContent">
                        - Listagem
                    </x-nav-link>
                </div>
            </div>
            <div class="categoryContainer">
                <div class="categoryHeaderContainer">
                    <div class="categoryHeaderIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 0 1-.517.608 7.45 7.45 0 0 0-.478.198.798.798 0 0 1-.796-.064l-.453-.324a1.875 1.875 0 0 0-2.416.2l-.243.243a1.875 1.875 0 0 0-.2 2.416l.324.453a.798.798 0 0 1 .064.796 7.448 7.448 0 0 0-.198.478.798.798 0 0 1-.608.517l-.55.092a1.875 1.875 0 0 0-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 0 1-.064.796l-.324.453a1.875 1.875 0 0 0 .2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 0 1 .796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 0 1 .517-.608 7.52 7.52 0 0 0 .478-.198.798.798 0 0 1 .796.064l.453.324a1.875 1.875 0 0 0 2.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 0 1-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 0 0 1.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 0 1-.608-.517 7.507 7.507 0 0 0-.198-.478.798.798 0 0 1 .064-.796l.324-.453a1.875 1.875 0 0 0-.2-2.416l-.243-.243a1.875 1.875 0 0 0-2.416-.2l-.453.324a.798.798 0 0 1-.796.064 7.462 7.462 0 0 0-.478-.198.798.798 0 0 1-.517-.608l-.091-.55a1.875 1.875 0 0 0-1.85-1.566h-.344ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="categoryHeaderTitle">
                        Parametrizações
                    </div>
                </div>
                <div class="categoryContentContainer">
                    <x-nav-link href="tipoCliente" class="categoryContent">
                        - Tipo de Cliente
                    </x-nav-link>
                    <x-nav-link href="niveisAcesso" class="categoryContent">
                        - Níveis de Acesso
                    </x-nav-link>
                    <x-nav-link href="estado" class="categoryContent">
                        - Estado
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</body>