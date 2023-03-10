@extends('home')

@section('content')
<div>
    <div>
        <div class="w-[1280px] mx-auto mt-10">
            <div class="w-[1200px] mx-auto">
                <div class="bg-cyan-600 p-2 rounded-lg text-center w-[400px] text-white mb-4 mx-auto shadow-md">
                    <h1>List Data Motor Yang Service</h1>
                </div>
                @if ($errors->any())
                <div class="w-[200px] p-2 bg-red-300 rounded-lg text-red-900 mt-10 text-center mx-auto">
                    <h1 class="text-red-700">
                        {{ $errors->first() }}
                    </h1>
                </div>
                @endif
                @if (session('success'))
                <div class="bg-green-500 w-full p-2 mt-2 mb-2 rounded-md ">
                    <h1 class="text-white">{{ session('success') }}</h1>
                </div>
                @endif
                <table class="border-2 rounded-xl shadow-lg overflow-hidden">
                    <thead class="border bg-cyan-600">
                        <tr>
                            <th class="border p-2 text-white w-[300px]">Pemilik Kendaraan</th>
                            <th class="border p-2 text-white w-[300px]">Model Kendaraan</th>
                            <th class="border p-2 text-white w-[300px]">Merek Kendaraan</th>
                            <th class="border p-2 text-white w-[300px]">Keluhan</th>
                            <th class="border p-2 text-white w-[300px]">Kerusakan</th>
                            <th class="border p-2 text-white w-[300px]">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        @foreach ($pendaftarans as $pendaftarans)
                                <tr>
                                    <td class="border p-2 w-[300px]">{{ $pendaftarans->nama}}</td>
                                    <td class="border p-2 w-[300px]">{{ $pendaftarans->model_kendaraan }}</td>
                                    <td class="border p-2 w-[300px]">{{ $pendaftarans->merek_kendaraan }}</td>
                                    <td class="border p-2 w-[300px]">{{ $pendaftarans->kerusakan }}</td>
                                    <td class="border p-2 w-[300px]">
                                        @foreach ($data_service as $data)
                                            @if ($data->id_pendaftaran == $pendaftarans->id)
                                                {{ $data->kerusakan }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="flex gap-2 mx-auto w-[220px]">
                                        @if(session()->has('logged', 'idRoleMekanik'))
                                        <div class="bg-green-800 p-2 rounded-lg text-white text-center items-center">
                                            <a href="{{ route('storeTindakService', $pendaftarans->id) }}"><button>Tambah Data Tindak Service</button></a>
                                        </div>
                                        @endif
                                        @if(session()->has('logged', 'idRoleAdmin'))
                                        <div class="bg-red-800 p-2 rounded-lg text-white w-full text-center">
                                            <a href="{{ route('deleteDataService', $pendaftarans->id) }}"><button>Delete</button></a>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
