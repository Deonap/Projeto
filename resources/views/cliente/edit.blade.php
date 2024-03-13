<title>Editar Cliente</title>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5">
                    <a href="{{route('cliente.index')}}" class="bg-sky-900 text-white p-2">
                        < Voltar
                    </a>
                    <p class="mt-5 font-semibold">Editar Cliente</p>
                    <p class="font-light">Parametrize os seguintes campos para editar o perfil deste Cliente.</p>

                    <form action="{{route('cliente.update', $cliente->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif

                        <div class="flex flex-wrap">
                            <input type="hidden" name="id" value="{{$cliente->id}}">
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Nome</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="nome" value="{{$cliente->nome}}">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Email</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="email" value="{{$cliente->email}}">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Telefone</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="telefone" value="{{$cliente->telefone}}">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Telemóvel</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="telemovel" value="{{$cliente->telemovel}}">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Morada</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="morada" value="{{$cliente->morada}}">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Código-Postal</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="codigoPostal" value="{{$cliente->codigoPostal}}">
                            </div>
                            <div class="w-full sm:w-1/2 mt-4">
                                <label class="font-bold">Localidade</label>
                                <br>
                                <input class="w-full sm:w-11/12 mt-2" type="text" name="localidade" value="{{$cliente->localidade}}">
                            </div>
                        </div>
                        <div class="mt-5 ml-20">
                            <button class="bg-sky-900 text-white p-2" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>