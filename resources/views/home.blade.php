<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"
	src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="{{config('midtrans.client_key')}}"></script>
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{asset('build/assets/app-7ebb306f.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/app-b0a4c440.js')}}">
    @livewireStyles
    <title>PERSONAL MOTOR</title>
</head>
<body>
   <div class="w-[1362px] mx-auto">
      <nav class="w-full mx-auto p-8 bg-cyan-600 shadow-xl">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl text-white font-bold">PERSONAL MOTOR</h1>
            <ul class="flex gap-10">
                @if (session()->has('logged', 'id_user'))
                <li class="text-white">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="text-white">
                    <a href="{{ route('listPendaftaran') }}">Daftar Booking</a>
                </li>
                @endif
                @if (session()->get('idRoleAdmin'))
                    <li class="text-white">
                        <a href="{{ route('admin.dasbord') }}">Dasboard</a>
                    </li>
                    <li class="text-white">
                        <a href="{{ route('listPendaftaran') }}">Data Boking Service</a>
                    </li>
                    <li class="text-white">
                        <a href="{{ route('listDataSperpat') }}">Data Sperpat</a>
                    </li>
                    <li class="text-white">
                        <a href="{{ route('listDataBelumService') }}">Data Tindakan Service</a>
                    </li>
                    <li class="text-white">
                        <a href="{{ route('listDataService') }}">Data Service</a>
                    </li>
                @endif
                @if(session()->get('idRoleMekanik'))
                <li class="text-white">
                    <a href="{{ route('admin.dasbord') }}">Dasboard</a>
                </li>
                <li class="text-white">
                    <a href="{{ route('listDataBelumService') }}">Data Tindakan Service</a>
                </li>
                <li class="text-white">
                    <a href="{{ route('listDataService') }}">Data Service</a>
                </li>
                @endif
            </ul>
            <div class="flex gap-2">
                @if(session()->has('logged'))
                <div class="bg-cyan-800 w-20 p-2 rounded-lg text-white text-center">
                    <a href="{{ route('logout') }}"><button>LOGOUT</button></a>
                </div>
                @else
                <div class="bg-cyan-800 w-20 p-2 rounded-lg text-white text-center">
                    <a href="{{ route('login') }}"><button>LOGIN</button></a>
                </div>
                @endif
            </div>
        </div>
      </nav>
      @yield('content')
   </div>
   @livewireScripts
   {{-- @vite('resources/js/app.js') --}}
</body>
</html>
