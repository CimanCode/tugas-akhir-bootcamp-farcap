@extends('home')

@section('content')
<div>
    <div class="w-[900px] mx-auto shadow-lg rounded-md mt-10 p-10">
        <div class="flex justify-between">
            <h1 class=" bg-cyan-600 w-[300px] text-center p-2 rounded-md text-white text-[20px] mx-auto">Tambah Data Service</h1>
        </div>
        <div class="flex-col mt-8 mx-auto">
            <form action="{{ route('updateTindakService', $pendaftaran->id)}}" method="post" enctype="multipart/form-data" class="w-[800px] mx-auto">
                @csrf
                @if (session()->has('success'))
                    <div class="bg-green-500 w-full p-2 mt-2">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex-col justify-between w-[500px] mx-auto">
                    <div class="flex-col">
                        <div class="mt-2 mb-2">
                            <label class="text-slate-900 font-bold text-[17px]" for="nama">Pemilik Kendaraan</label>
                        </div>
                        <input type="text" name="nama"
                        class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600" disabled
                        value="{{ $pendaftaran->nama }}">
                    </div>
                    <div class="flex-col">
                        <div class="mb-2 mt-2">
                            <label class="text-slate-900 font-bold text-[17px]" for="model_kendaraan">Model Kendaraan</label>
                        </div>
                        <input type="text" name="model_kendaraan"
                        class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600" disabled
                        value="{{ $pendaftaran->model_kendaraan }}">
                    </div>
                    <div class="flex-col">
                        <div class="mb-2 mt-2">
                            <label class="text-slate-900 font-bold text-[17px]" for="merek_kendaraan">Merek Kendaraan</label>
                        </div>
                        <input type="text" name="merek_kendaraan"
                        class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600" disabled
                        value="{{ $pendaftaran->merek_kendaraan }}">
                    </div>
                    <div class="flex-col">
                        <div class="mb-2 mt-2">
                            <label class="text-slate-900 font-bold text-[17px]" for="kerusakan">Kerusakan</label>
                        </div>
                        <textarea type="text" name="kerusakan"
                        class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600"></textarea>
                    </div>
                    <div class="bg-cyan-600 p-2 text-center text-white rounded-md mx-auto mt-4">
                        <button type="submit">Save</button>
                    </div>
                </div>
            </form>
            <div class="bg-gray-600 p-2 text-center text-white rounded-md ml-[160px] mt-2 w-[500px]">
                <a href="{{ route('listDataBelumService') }}"><button type="submit">Back To List</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
