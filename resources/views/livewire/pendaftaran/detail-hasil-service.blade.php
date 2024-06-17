@extends('home')
@section('content')
<div class="w-[1220px] mx-auto shadow-lg mt-8 p-4">
    <div class="shadow-md p-2 w-[200px] mx-auto text-center bg-cyan-700 text-white rounded-md mb-4">
        <h1>Detail Hasil Service</h1>
    </div>
    <div class="flex gap-2">
        <div class="flex-col">
            <div class="shadow-xl p-4 rounded-lg">
                <div class="shadow-md p-2 w-[200px] mt-4 mx-auto text-center bg-cyan-700 text-white rounded-md mb-4">
                    <h1>Detail Pendaftaran</h1>
                </div>
                <img src="{{ Storage::url($pendaftaran->photo_kendaraan) }}" alt="" class="rounded-lg w-[400px]">
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Nama</span> : {{ $pendaftaran->nama }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Alamat</span> : {{ $pendaftaran->alamat }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">No HandPhone</span> : {{ $pendaftaran->no_handphone }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Gender</span> : {{ $pendaftaran->gender }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">No Kendaraan</span> : {{ $pendaftaran->no_kendaraan }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Kendaraan</span> : {{ $pendaftaran->merek_kendaraan }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Model Kendaraan</span> : {{ $pendaftaran->model_kendaraan }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Keluhan</span> : {{ $pendaftaran->kerusakan }}</p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Tanggal Mendaftar</span> : {{ $pendaftaran->created_at }}</p>
            </div>
        </div>
        <div class="flex-col justify-center gap-4 w-[500px]">
            <div class="shadow-xl p-4 rounded-lg mt-2">
                <div class="shadow-md p-2 w-[200px] mt-2 mx-auto text-center bg-cyan-700 text-white rounded-md mb-4">
                    <h1>Detail Hasil Service</h1>
                </div>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Di Service Oleh</span> :
                    @if ($pendaftaran['status'] == 'Service Selesai')
                        {{ $dataService->nama_mekanik }}
                    @endif
                </p>
                @if ($dataService->nama_mekanik != null)
                    <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Tanggal Selesai</span> :
                        @if($pendaftaran['status'] == 'Service Selesai')
                            {{ $dataService->updated_at }}
                        @endif
                    </p>
                    @else
                    <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Tanggal Selesai</span> : </p>
                    @endif
                    <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Kerusakan Yang Ditemukan</span> :
                    @if($pendaftaran['status'] == 'Service Selesai')
                    {{ $dataService->kerusakan }}</p>
                    @endif
                    <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Jasa Service</span> : Rp.
                    @if($pendaftaran['status'] == 'Service Selesai')
                        {{ $dataService->jasa_service }}
                    @endif
                </p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">List Sperpat Yang Di Pakai</span> :
                    @if($pendaftaran['status'] == 'Service Selesai')
                    {{ $dataService->listSperpat }}
                    @endif
                </p>
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Harga Total Sperpat Yang Dipakai Saat Service</span> : Rp.
                    @if($pendaftaran['status'] == 'Service Selesai')
                    {{ $dataService->harga_total }}
                    @endif
                </p>
                <hr class="mt-4 mb-4 bg-slate-900">
                <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Total Jasa Service</span> : Rp.
                    @if($pendaftaran['status'] == 'Service Selesai')
                    {{ $pendaftaran->total_harga }}
                    @endif
                </p>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <div class="shadow-xl p-2 rounded-md h-fit">
                @if ($pendaftaran['status'] == 'Menunggu Konfirmasi')
                    <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Status</span> : <span class="bg-yellow-600 p-1 rounded-md text-white w-full text-center">{{ $pendaftaran->status }}</span></p>
                @endif
                @if ($pendaftaran['status'] == 'Telah Dikonfirmasi')
                    <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Status</span> : <span class="bg-cyan-600 p-1 rounded-md text-white w-full text-center">{{ $pendaftaran->status }}</span></p>
                @endif
                @if ($pendaftaran['status'] == 'Service Selesai')
                    <p class="text-slate-900 text-[18px]"><span class="text-yellow-700 text-[18px]">Status</span> : <span class="bg-green-600 p-1 rounded-md text-white w-full text-center">{{ $pendaftaran->status }}</span></p>
                @endif
            </div>
            <button class="px-5 py-2 bg-blue-700 rounded text-white" id="pay-button">Bayar Sekarang</button>
        </div>
    </div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
    <script type="text/javascript">
       // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
@endsection
