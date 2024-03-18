<title>Ver Cliente</title>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <a href="{{route('cliente.index')}}" class="bg-sky-900 text-white p-2">
                    < Voltar
                </a>
                <p class="mt-5 font-semibold">Cliente</p>
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-1/2 mt-4">
                        <label class="font-bold">Nome</label>
                        <br>
                        <input class="w-full sm:w-11/12 mt-2" type="text" name="nome" value="{{$cliente->nome}}" disabled>
                    </div>
                    <div class="w-full sm:w-1/2 mt-4">
                        <label class="font-bold">Email</label>
                        <br>
                        <input class="w-full sm:w-11/12 mt-2" type="text" name="email" value="{{$cliente->email}}" disabled>
                    </div>
                    <div class="w-full sm:w-1/2 mt-4">
                        <label class="font-bold">Telefone</label>
                        <br>
                        <input class="w-full sm:w-11/12 mt-2" type="text" name="telefone" value="{{$cliente->telefone}}" disabled>
                    </div>
                    <div class="w-full sm:w-1/2 mt-4">
                        <label class="font-bold">Telemóvel</label>
                        <br>
                        <input class="w-full sm:w-11/12 mt-2" type="text" name="telemovel" value="{{$cliente->telemovel}}" disabled>
                    </div>
                    <div class="w-full sm:w-1/2 mt-4">
                        <label class="font-bold">Morada</label>
                        <br>
                        <input class="w-full sm:w-11/12 mt-2" type="text" name="morada" value="{{$cliente->morada}}" disabled>
                    </div>
                    <div class="w-full sm:w-1/2 mt-4">
                        <label class="font-bold">Código-Postal</label>
                        <br>
                        <input class="w-full sm:w-11/12 mt-2" type="text" name="codigoPostal" value="{{$cliente->codigoPostal}}" disabled>
                    </div>
                    <div class="w-full sm:w-1/2 mt-4">
                        <label class="font-bold">Localidade</label>
                        <br>
                        <input class="w-full sm:w-11/12 mt-2" type="text" name="localidade" value="{{$cliente->localidade}}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>