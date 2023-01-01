@extends('home')

@section('content')
<div>
    <div class="w-[1280px] mx-auto mt-10">
        <div class="w-[1000px] mx-auto">
            <div class="bg-cyan-600 p-2 rounded-lg text-center w-[200px] text-white mb-4">
                <a href="{{ route('storDataSperpat') }}"><button>Tambah Sperpat</button></a>
            </div>
            @if (session()->has('success'))
                <div class="bg-green-500 w-full p-2 mt-2 mb-2 rounded-md">
                    <h1 class="text-white">{{ session('success') }}</h1>
                </div>
            @endif
            <table class="border-2 w-[1000px] shadow-lg rounded-xl overflow-hidden">
                <thead class="border bg-cyan-600">
                    <tr>
                        <th class="border p-2 text-white w-10">Nama Sperpat</th>
                        <th class="border p-2 text-white w-10">Jumlah</th>
                        <th class="border p-2 text-white w-10">Harga Sperpat</th>
                        <th class="border p-2 text-white w-10">Action</th>
                    </tr>
                </thead>
                <tbody class="border">
                    @foreach ($data_sperpat as $data)
                        <tr>
                            <td class="border p-2 w-[200px]">{{ $data->nama_sperpat }}</td>
                            <td class="border p-2 w-[200px]">{{ $data->jumlah }}</td>
                            <td class="border p-2 w-[200px]">Rp.{{ $data->harga_sperpat }}</td>
                            <td class="border flex gap-2 mx-auto w-[200px]">
                                <div class="bg-green-800 p-2 rounded-lg text-white w-full text-center">
                                    <a href="{{ route('showDataSperpat', $data->id) }}"><button>Update</button></a>
                                </div>
                                <div class="bg-red-600 p-2 rounded-lg text-white w-full text-center">
                                    <a href="{{ route('deleteDataSperpat', $data->id) }}"><button>Delete</button></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
