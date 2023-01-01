<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @livewireStyles
    <title>PERSONAL MOTOR</title>
</head>
<body>
<div>
    <div class="mx-auto w-[1000px] shadow-xl p-14 mt-10">
        <h1 class="text-[50px] font-bold text-slate-900 text-center mb-[20px]" >Register</h1>
        @if ($errors->any())
            <div class="w-[350px] p-2 bg-red-300 rounded-lg text-red-900 mt-4 text-center mx-auto">
                <h1 class="text-red-700">
                    {{ $errors->first() }}
                </h1>
            </div>
        @endif
        <div class="w-[700px] mx-auto mt-4">
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="mx-auto w-[350px]">
                    <div class="flex-col">
                        <div class="mb-2">
                            <label for="nama" class="text-slate-900 font-bold mr-[50px]"> Nama Lengkap </label>
                        </div>
                            <input type="text" name="nama" id="nama"
                            class="border-2 w-[350px] p-2 rounded-md focus:outline-cyan-600"
                            placeholder= "Masukan Username"/>
                    </div>
                    <div class="flex-col">
                        <div class="mb-2 mt-2">
                            <label for="username" class="text-slate-900 font-bold mr-[50px]"> Username </label>
                        </div>
                            <input type="text" name="username" id="username"
                            class="border-2 w-[350px] p-2 rounded-md focus:outline-cyan-600"
                            placeholder= "Masukan Username"/>
                    </div>
                    <div class="flex-col">
                        <div class="mb-2 mt-2">
                            <label for="email" class="text-slate-900 font-bold mr-[50px]"> Email </label>
                        </div>
                            <input type="text" name="email" id="email"
                            class="border-2 w-[350px] p-2 rounded-md focus:outline-cyan-600"
                            placeholder= "Masukan email"/>
                    </div>
                    <div class="flex-col">
                        <div class="mb-2 mt-2">
                            <label for="password" class="text-slate-900 font-bold mr-[40px]"> Password </label>
                        </div>
                            <input type="password" name="password" id="password"
                            class="border-2 w-[350px] p-2 rounded-md focus:outline-cyan-600"
                            placeholder="Masukan Password"/>
                    </div>
                    <div class="flex gap-4 mt-[40px] justify-center">
                        <div class="w-full bg-cyan-600 p-2 rounded-lg text-center text-white">
                            <button type="submit" @class(['btn', 'btn-primary'])>Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@livewireScripts
@vite('resources/js/app.js')
</body>
</html>
