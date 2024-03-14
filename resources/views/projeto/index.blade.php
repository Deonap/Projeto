<title>Projetos</title>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5">
                    <div class="mt-8">
                        <a href="{{route('projeto.create')}}" class="bg-sky-900 text-white p-2">
                            Adicionar Projeto
                        </a>
                    </div>
                    <div class="mt-5">
                        @foreach($projetos as $i => $projeto)
                        <div>
                            {{$projeto->nome}}
                        </div>
                        @endforeach
                    </div>
                    {{$projetos->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>