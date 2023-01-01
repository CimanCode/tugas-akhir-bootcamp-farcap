<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div class="mx-auto w-[1000px] shadow-xl p-14 mt-10">
        <h1 class="text-[50px] font-bold text-slate-900 text-center mb-[20px]" >Login</h1>
        @if ($errors->any())
        <div class="w-[200px] p-2 bg-red-300 rounded-lg text-red-900 mt-10 text-center mx-auto">
            <h1 class="text-red-700">
                {{ $errors->first() }}
            </h1>
        </div>
        @endif
        <div class="w-[700px] mx-auto mt-6">
            <form method="post">
                @csrf
                <div class="mx-auto w-[350px]">
                <div class="flex-col">
                    <div class="mb-2">
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
                <div class="flex-col">
                    <div class="mb-2 mt-2">
                        <label for="password" class="text-slate-900 font-bold mr-[40px]"> Role </label>
                    </div>
                    <select name="role_id" id="role_id" class="border-2 w-[350px] p-2 rounded-md focus:outline-cyan-600">
                        <option value=""><span  class="text-gray-200">--Select-Role--</span></option>
                        <option class="border-2 p-2 rounded-md focus:outline-cyan-600" value="2">Admin</option>
                        <option class="border-2 p-2 rounded-md focus:outline-cyan-600" value="3">Mekanik</option>
                    </select>
                </div>
                <div class="flex gap-4 mt-[30px] justify-center">
                    <div class="w-full bg-cyan-600 p-2 rounded-lg text-center text-white">
                        <button type="submit" @class(['btn', 'btn-primary'])>Login</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


