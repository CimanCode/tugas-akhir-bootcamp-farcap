@extends('home')

@section('content')
<div>
    <div class="w-[900px] mx-auto shadow-lg rounded-md mt-10 p-10">
        <h1 class="text-center bg-cyan-600 w-fit p-2 rounded-md text-white text-[20px] justify-center mx-auto">Tambah Daftar Booking Service</h1>
        <div class="flex-col mt-8">
            <form action="{{ route('pendaftaranUpdate', ["id" => $pendaftaran->user_id]) }}" method="post" enctype="multipart/form-data" class="w-[500px] mx-auto">
                @method('put')
                @csrf
                @if($errors->any())
                    @foreach ($errors->all() as $e)
                        <div class="bg-red-400 w-full p-2 mt-2 mb-2 rounded-md text-red-700">{{ $e }}</div>
                    @endforeach
                @endif
                <div class="flex-col">
                    <div class="mb-2 mt-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="nama">Nama</label>
                    </div>
                    <input type="text" name="nama"
                     class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600"
                     value="{{ $pendaftaran->nama }}">
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="alamat">Alamat</label>
                    </div>
                    <textarea type="text" name="alamat"
                    class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600">
                    {{ $pendaftaran->alamat }}</textarea>
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="no_handphone">No_Handphone</label>
                    </div>
                    <input type="text" name="no_handphone"
                    class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600"
                    value="{{ $pendaftaran->no_handphone }}">
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="gender">Nama</label>
                    </div>
                    <select name="gender" class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="no_kendaraan">No Kendaraan</label>
                    </div>
                    <input type="text" name="no_kendaraan"
                    class="border-2 w-[500px] p-2 focus:outline-cyan-600 rounded-md"
                    value="{{ $pendaftaran->no_kendaraan }}">
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="merek_kendaraan">Merek Kendaraan</label>
                    </div>
                    <input type="text" name="merek_kendaraan"
                    class="border-2 w-[500px] p-2 focus:outline-cyan-600 rounded-md"
                    value="{{ $pendaftaran->merek_kendaraan }}">
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="model_kendaraan">Model Kendaraan</label>
                    </div>
                    <input type="text" name="model_kendaraan"
                    class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600"
                    value="{{ $pendaftaran->model_kendaraan }}">
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="kerusakan">Keluhan</label>
                    </div>
                    <textarea type="text" name="kerusakan"
                    class="border-2 w-[500px] p-2 focus:outline-cyan-600 rounded-md">
                    {{ $pendaftaran->kerusakan }}</textarea>
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-3">
                        <label class="text-slate-900 font-bold text-[17px]" for="photo_kendaraan">Photo Kendaraan</label>
                    </div>
                    <input type="file" name="photo_kendaraan" id="photo_kendaraan"
                    class="border-2 w-[500px] p-2 focus:outline-cyan-600 rounded-md"
                    {{ $pendaftaran->photo_kendaraan }}>
                </div>
                <div class="bg-cyan-600 p-2 text-center mt-4 text-white rounded-md mx-auto">
                    <button type="submit">Save</button>
                </div>
            </form>
                <div class="bg-gray-600 p-2 text-center text-white rounded-md mx-auto mt-2 w-[500px]">
                    <a href="{{ route('listPendaftaran') }}"><button type="submit">Back To List</button></a>
                </div>
        </div>
    </div>
</div>
@endsection
