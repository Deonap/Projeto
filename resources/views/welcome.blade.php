<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-wrap">
        <div class="invisible md:visible md:w-[65%] h-screen bg-cover bg-center bg-no-repeat" style="background-image:url('/images/loginPageWM.png')">
        </div>
        <div class="w-[90%] m-auto md:w-[35%] p-10 mt-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex">
                    <h1 class="font-bold text-2xl m-auto pb-5">Login</h1>
                </div>
                <!-- Email -->
                <div>
                    <input id="email" class="mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <input id="password" class="mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class="flex items-center center mt-4">        
                    <button class="bg-sky-900 text-white p-2 w-full">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>