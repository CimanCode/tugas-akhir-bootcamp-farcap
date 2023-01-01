@extends('home')

@section('content')
<div>
    <div class="w-[900px] mx-auto shadow-lg rounded-md mt-10 p-10">
        <h1 class="text-center bg-cyan-600 w-fit p-2 rounded-md text-white text-[20px] justify-center mx-auto">Tambah Sperpat</h1>
        <div class="flex-col mt-8 bg-slate-500]">
            <form action="{{ route('createDataSperpat') }}" method="post" enctype="multipart/form-data" class="w-[500px] mx-auto">
                @csrf
                @if (session()->has('success'))
                    <div class="bg-green-500 w-full p-2 mt-2">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="nama_sperpat">Nama</label>
                    </div>
                    <input type="text" name="nama_sperpat"
                    class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600">
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="jumlah">Jumlah</label>
                    </div>
                    <input type="number" name="jumlah"
                    class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600">
                </div>
                <div class="flex-col">
                    <div class="mt-2 mb-2">
                        <label class="text-slate-900 font-bold text-[17px]" for="harga_sperpat">Harga</label>
                    </div>
                    <input type="number" name="harga_sperpat"
                    class="border-2 w-[500px] rounded-md p-2 focus:outline-cyan-600">
                </div>
                <div class="bg-cyan-600 p-2 text-center text-white rounded-md mx-auto mt-4">
                    <button type="submit">Save</button>
                </div>
            </form>
                <div class="bg-gray-600 p-2 text-center text-white rounded-md mx-auto mt-2 w-[500px]">
                    <a href="{{ route('listDataSperpat') }}"><button type="submit">Back To List</button></a>
                </div>
        </div>
    </div>
</div>
@endsection
