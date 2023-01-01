@extends('home')
@section('content')
<div>
    @if ($errors->any())
    <div class="w-[400px] p-2 bg-red-300 rounded-lg text-red-900 mt-10 text-center mx-auto">
        <h1 class="text-red-700">
            {{ $errors->first() }}
        </h1>
    </div>
    @endif
    <div class="shadow-lg p-4 mt-4 w-[1200px] mx-auto">
        <h1 class="text-cyan-900 font-bold text-[24px] text-center mb-4 mt-6">Kenapa Harus Personal Motor ?</h1>
    </div>
    <div class="flex w-[1280px] shadow-xl mx-auto mt-10 p-4">
        <div class="w-[700px] mx-auto">
            <h2 class="p-1 w-fit rounded-md text-cyan-900 mb-2 text-[20px] font-bold">Khusus untuk Anda yang peduli sama motor sendiri. Saatnya bawa motor kesayangan buat servis</h2>
            <h2 class="p-1 w-fit rounded-md text-cyan-900 mb-2 text-[20px] font-bold">Awas!! Jangan Mentang-Mentang Motor Baru Sampe Lupa Buat Servis.</h2>
            <h2 class="p-1 w-fit rounded-md text-cyan-900 mb-2 text-[20px] font-bold">BREAKING NEWS. Sekarang Bengkel Kesayangan Kamu ada di Tik Tok Lho, Follow Sekarang Biar Makin Seru!</h2>
            <h2 class="p-1 w-fit rounded-md text-cyan-900 text-[20px] font-bold">Mau servis motor tapi malas keluar rumah? Sekarang Servis motor bisa dari rumah.</h2>
            <div class="flex mt-6">
                <div class="bg-cyan-600 p-2 rounded-md w-fit text-white font-bold text-[20px]">
                    <a href="{{ route('loginUser') }}"><button>Mulai Daftar Booking Service ?</button></a>
                </div>
            </div>
        </div>
        <div class="flex-col gap-4 justify-center mt-4 h-[300px] shadow-xl">
            <img src="{{ asset('assets/image.jpg') }}" alt="motor" class="w-full h-full rounded-lg ">
        </div>
    </div>
</div>
@endsection
