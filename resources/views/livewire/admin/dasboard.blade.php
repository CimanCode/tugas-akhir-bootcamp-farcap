@extends('home')

@section('content')
<div>
    <section>
        <div class="bg-white shadow-xl w-[1250px] mx-auto p-4 mt-4 flex justify-between">
            <h1 class="text-slate-800 text-[20px] font-bold">Dasboard Admin</h1>
            @if(session()->get('idRoleAdmin'))
                <h1 class="text-slate-800 text-[20px] font-bold">Selamata Datang Admin</h1>
            @endif
            @if(session()->get('idRoleMekanik'))
                <h1 class="text-slate-800 text-[20px] font-bold">Selamata Datang Mekanik</h1>
            @endif
        </div>
        <div class="flex gap-4 justify-center">
            <div class="bg-green-500 w-[300px] rounded-md mt-10 p-10">
                <div>
                    <h1 class="text-white">Rp. 0</h1>
                    <h1 class="text-white">Pendapatan Hari Ini</h1>
                </div>
            </div>
            <div class="bg-cyan-500 w-[300px] rounded-md mt-10 p-10">
                <div>
                    <h1 class="text-white">0</h1>
                    <h1 class="text-white">Service Selesai Hari Ini</h1>
                </div>
            </div>
            <div class="bg-yellow-500 w-[300px] rounded-md mt-10 p-10">
                <div>
                    <h1 class="text-white">0</h1>
                    <h1 class="text-white">Sperpat terjual Hari Ini</h1>
                </div>
            </div>
            <div class="bg-red-500 w-[300px] rounded-md mt-10 p-10">
                <div>
                    <h1 class="text-white">0</h1>
                    <h1 class="text-white">Stok Telah Habis</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="flex gap-8 justify-center">
            <img src="{{ asset('assets/image3.png') }}" alt="">
            <img src="{{ asset('assets/image4.png') }}" alt="">
        </div>
    </section>
</div>
@endsection
