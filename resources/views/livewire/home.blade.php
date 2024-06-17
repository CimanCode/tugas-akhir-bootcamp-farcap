@extends('home')

@section('content')
<div class="w-full">
    <div class="flex justify-center">
        <div class="p-4 shadow-lg w-[1200px] rounded-md flex justify-center mt-6">
            <h1 class="text-cyan-900 font-bold text-[20px]">Selamat Datang Di Personal Motor, @if (session()->has("logged", "id_user"))
                {{ $user->nama }}
            @endif</h1>
        </div>
    </div>
    <div class="w-[1200px] mx-auto ">
        <div class="mt-4 flex justify-between gap-4">
            <div class="p-4 shadow-xl w-[600px] rounded-md items-center">
                <h1 class="text-cyan-900 font-bold text-[50px] mt-10">Personal Motor Adalah Tempat Reparasi Yang Belum Pernah Ada</h1>
            </div>
            <div class="p-4 shadow-xl w-[600px] rounded-md items-center">
                <img src="{{ asset('assets/image5.png') }}" alt="" class="w-[500px] mx-auto">
            </div>
        </div>
    </div>
    <div class="w-[1200px] mx-auto">
        <div class="p-4 shadow-xl rounded-md text-center mt-4 items-center">
            <h1 class="text-cyan-900 font-bold text-[20px]">Alamat : Jl.Raya Taraju, No.16, Kec.Taraju, Kab.Tasikmalaya</h1>
        </div>
    </div>
</div>
@endsection
