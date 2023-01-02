@extends('home')

@section('content')
<div>
    <div class="w-[1280px] mx-auto mt-10">
        @if(session()->has('logged', 'id_user'))
        <div class="bg-cyan-600 p-2 rounded-lg text-center w-[200px] text-white mb-4">
            <a href="{{ route('storePendaftaran') }}"><button> Daftar Booking</button></a>
        </div>
        @endif
        @if (session('success'))
            <div class="bg-green-500 w-full p-2 mt-2 mb-2 rounded-md ">
                <h1 class="text-white">{{ session('success') }}</h1>
            </div>
         @endif
        <table class="border-2 shadow-lg rounded-xl overflow-hidden">
            <thead class="border bg-cyan-600">
                <tr>
                    <th class="border p-2 text-white">Nama</th>
                    <th class="border p-2 text-white">Alamat</th>
                    <th class="border p-2 text-white">No HandPhone</th>
                    <th class="border p-2 text-white">Gender</th>
                    <th class="border p-2 text-white">No Kendaraan</th>
                    <th class="border p-2 text-white">Merek Kendaraan</th>
                    <th class="border p-2 text-white">Model Kendaraan</th>
                    <th class="border p-2 text-white">Keluhan</th>
                    <th class="border p-2 text-white">Foto Kendaraan</th>
                    <th class="border p-2 text-white">Status</th>
                    <th class="border p-2 text-white">Action</th>
                </tr>
            </thead>
            <tbody class="border">
                @foreach ($pendaftaran as $pendaftarans)
                    <tr>
                        <td class="border p-2">{{ $pendaftarans->nama }}</td>
                        <td class="border p-2">{{ $pendaftarans->alamat }}</td>
                        <td class="border p-2">{{ $pendaftarans->no_handphone }}</td>
                        <td class="border p-2">{{ $pendaftarans->gender }}</td>
                        <td class="border p-2">{{ $pendaftarans->no_kendaraan }}</td>
                        <td class="border p-2">{{ $pendaftarans->merek_kendaraan }}</td>
                        <td class="border p-2">{{ $pendaftarans->model_kendaraan }}</td>
                        <td class="border p-2">{{ $pendaftarans->kerusakan }}</td>
                        <td class="border p-2">
                            <img src="{{ Storage::url($pendaftarans->photo_kendaraan) }}" alt="" class="w-[100px]">
                        </td>
                        <td class="border p-2">{{ $pendaftarans->status }}</td>
                        <td class="flex flex-wrap gap-2 mx-auto justify-center">
                            @if (session()->has('logged', 'id_user'))
                                <div class="bg-green-800 p-2 rounded-lg text-white w-full text-center">
                                    <a href="{{ route('pendaftaranShowUpdate', ["id" =>$pendaftarans->user_id]) }}"><button>Update</button></a>
                                </div>
                                <div class="bg-cyan-800 p-2 rounded-lg text-white w-full text-center">
                                    <a href="{{ route('detailPendaftaran', ["id" =>$pendaftarans->id]) }}"><button>Detail</button></a>
                                </div>
                            @endif
                            @if(session()->has('logged', 'idRoleAdmin'))
                                <div class="bg-red-600 p-2 rounded-lg text-white w-full text-center">
                                    <a href="{{ route('deletePendaftaran', ["id" =>$pendaftarans->id]) }}"><button>Delete</button></a>
                                </div>
                                <div class="bg-cyan-800 p-2 rounded-lg text-white w-full text-center">
                                    <a href="{{ route('detailPendaftaran', ["id" =>$pendaftarans->id]) }}"><button>Detail</button></a>
                                </div>
                                @if( $pendaftarans['status'] = 'Menunggu Konfirmasi')
                                    <form method="post" action="{{ route('konfirmasiPendaftaran', $pendaftarans->id) }}">
                                        @csrf
                                        <div class="bg-cyan-600 p-2 rounded-lg text-white w-full text-center">
                                            <button type="submit">Konfirmasi</button></a>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
