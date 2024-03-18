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
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->nome}}</option>   
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="projectPageContent">
                    <!-- Este div é populado por JS -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const projectPageContent = document.getElementById('projectPageContent');
    projectPageContent.innerHTML = '<h1>ISTO É UM TESTE</h1>'

    document.getElementById('projectFilter').addEventListener('input', function(){
        projectPageContent.innerHTML += '<h1>ISTO É UM TESTE</h1>'
    });

</script>