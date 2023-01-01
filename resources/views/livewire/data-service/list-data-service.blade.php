@extends('home')

@section('content')
<div>
    <div>
        <div class="w-[1280px] mx-auto mt-10">
            <div class="w-[1200px] mx-auto">
                <div class="bg-cyan-600 p-2 rounded-lg text-center w-[400px] text-white mb-4 mx-auto shadow-md">
                    <h1>List Data Hasil Service</h1>
                </div>
                @if ($errors->any())
                <div class="w-[200px] p-2 bg-red-300 rounded-lg text-red-900 mt-10 mb-4 text-center mx-auto">
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
                            <th class="border p-2 text-white w-[300px]">Tanggal Masuk</th>
                            <th class="border p-2 text-white w-[300px]">Tanggal Selesai</th>
                            <th class="border p-2 text-white w-[300px]">Doperbaiki Oleh</th>
                            <th class="border p-2 text-white w-[300px]">Jasa Service</th>
                            <th class="border p-2 text-white w-[300px]">list sperpat yang di pakai</th>
                            <th class="border p-2 text-white w-[300px]">Total Harga Sperpat Yang Di Pakai</th>
                            <th class="border p-2 text-white w-[300px]">Total Harga</th>
                            <th class="border p-2 text-white w-[300px]">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border">
                        @foreach ($pendaftarans as $pendaftaran)
                                <tr>
                                    <td class="border p-2 w-[300px]">{{ $pendaftaran->nama}}</td>
                                    <td class="border p-2 w-[300px]">{{ $pendaftaran->model_kendaraan }}</td>
                                    <td class="border p-2 w-[300px]">{{ $pendaftaran->merek_kendaraan }}</td>
                                    <td class="border p-2 w-[300px]">{{ $pendaftaran->created_at->format('y-m-d') }}</td>
                                    <td class="border p-2 w-[300px]">
                                    @foreach ($data_service as $data )
                                        @if ($data->nama_mekanik != null)
                                            @if($data->id_pendaftaran == $pendaftaran->id)
                                            {{ $data->updated_at->format('y-m-d') }}
                                            @endif
                                        @endif
                                    @endforeach
                                    </td>
                                    <td class="border p-2 w-[300px]">
                                        @foreach ($data_service as $data )
                                            @if($data->id_pendaftaran == $pendaftaran->id)
                                            {{ $data->nama_mekanik }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border p-2 w-[300px]">
                                        @foreach ($data_service as $data)
                                            @if($data->id_pendaftaran == $pendaftaran->id)
                                                Rp.{{ $data->jasa_service }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border p-2 w-[300px]">
                                        @foreach ($data_service as $data)
                                            @if($data->id_pendaftaran == $pendaftaran->id)
                                                Rp.{{ $data->listSperpat }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border p-2 w-[300px]">
                                        @foreach ($data_service as $data)
                                            @if ($data->id_pendaftaran == $pendaftaran->id)
                                                Rp.{{ $data->harga_total }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border p-2 w-[600px]">Rp.{{ $pendaftaran->total_harga }}</td>
                                    <td class="flex gap-2 mx-auto w-[200px]">
                                        @if(session()->has('logged', 'idRoleMekanik'))
                                        <div class="bg-green-800 p-2 rounded-lg text-white w-[170px] text-center">
                                            <a href="{{ route('storeDataService', $pendaftaran->id) }}"><button>Tambah Data Service</button></a>
                                        </div>
                                        @endif
                                        @if(session()->has('logged', 'idRoleAdmin'))
                                            @if($pendaftarans['status'] = 'Telah Dikonfirmasi')
                                            <form method="post" action="{{ route('selesai', $pendaftaran->id) }}">
                                                @csrf
                                                <div class="bg-cyan-600 p-2 rounded-lg text-white w-full text-center">
                                                    <button type="submit" class="w-[80px]">Selesai</button></a>
                                                </div>
                                            </form>
                                            @endif
                                        <div class="bg-red-800 p-2 rounded-lg text-white w-full text-center">
                                            <a href="{{ route('deleteDataService', $pendaftaran->id) }}"><button>Delete</button></a>
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
