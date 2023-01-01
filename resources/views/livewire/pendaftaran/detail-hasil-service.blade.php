@extends('home')
@section('content')
<div class="w-[1200px] mx-auto shadow-lg mt-8 p-4">
    <div class="shadow-md p-2 w-[200px] mx-auto text-center bg-cyan-700 text-white rounded-md mb-4">
        <h1>Detail Hasil Service</h1>
    </div>
    <div class="flex justify-center gap-4">
        <div class="w-[500px] shadow-xl rounded-lg items-center bg-black">
            <img src="{{ Storage::url($pendaftaran->photo_kendaraan) }}" alt="" class="rounded-lg w-full h-full">
        </div>
        <div class="shadow-xl p-4 rounded-lg">
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Nama</span> : {{ $pendaftaran->nama }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Alamat</span> : {{ $pendaftaran->alamat }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">No HandPhone</span> : {{ $pendaftaran->no_handphone }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Gender</span> : {{ $pendaftaran->gender }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">No Kendaraan</span> : {{ $pendaftaran->no_kendaraan }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Kendaraan</span> : {{ $pendaftaran->merek_kendaraan }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Model Kendaraan</span> : {{ $pendaftaran->model_kendaraan }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Keluhan</span> : {{ $pendaftaran->kerusakan }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Tanggal Mendaftar</span> : {{ $pendaftaran->created_at }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Di Service Oleh</span> : {{ $dataService->nama_mekanik }}</p>
            @if ($dataService->nama_mekanik != null)
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Tanggal Selesai</span> : {{ $dataService->updated_at }}</p>
            @else
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Tanggal Selesai</span> : </p>
            @endif
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Kerusakan Yang Ditemukan</span> : {{ $dataService->kerusakan }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Jasa Service</span> : Rp. {{ $dataService->jasa_service }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">List Sperpat Yang Di Pakai</span> : {{ $dataService->listSperpat }}</p>
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Harga Total Sperpat Yang Dipakai Saat Service</span> : Rp.{{ $dataService->harga_total }}</p>
            <hr class="mt-4 mb-4 bg-slate-900">
            <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Total Jasa Service</span> : Rp.{{ $pendaftaran->total_harga }}</p>
        </div>
    </div>
</div>
@endsection
