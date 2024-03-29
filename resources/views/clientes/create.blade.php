<title>Adicionar Cliente</title>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <a href="{{route('clientes.index')}}" class="bg-sky-900 text-white p-2">
                    < Voltar
                </a>
                <p class="mt-5 font-semibold">Adicionar Cliente</p>
                <p class="font-light">Parametrize os seguintes campos para adicionar um novo Cliente.</p>
                <div>
                    <form action="{{route('clientes.store')}}" method="POST">
                        @csrf

                        @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif

                        <div class="flex flex-wrap">
                            <input type="hidden" name="id" value="">
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Nome</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="nome" value={{old('nome')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Email</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="email" value={{old('email')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Telefone</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="telefone" value={{old('telefone')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Telemóvel</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="telemovel" value={{old('telemovel')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Morada</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="morada" value={{old('morada')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Código-Postal</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="codigoPostal" value={{old('codigoPostal')}}>
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Localidade</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="localidade" value={{old('localidade')}}>
                            </div>
                        </div>
                        <div class="mt-5 ml-20">
                            <button class="bg-sky-900 text-white p-2" type="submit">
                                Adicionar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>