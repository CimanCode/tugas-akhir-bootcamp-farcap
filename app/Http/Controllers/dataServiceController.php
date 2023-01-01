<?php

namespace App\Http\Controllers;

use App\Models\data_service;
use App\Models\data_sperpat;
use App\Models\pendaftaran;
use Illuminate\Http\Request;

class dataServiceController extends Controller
{
    public function index(){
        // $data = pendaftaran::join('data_service', 'data_service.id_pendaftaran', '=', 'pendaftaran.id')
        //                      ->get(['pendaftaran.*', 'data_service.*']);
        $data_service = data_service::query()->get();
        return view('livewire.data-service.list-data-service', [
            'pendaftarans' => pendaftaran::all(),
            'dataSperpat' => data_sperpat::all(),
            'data_service' => $data_service
        ]);
    }

    public function list(){
        $data_service = data_service::query()->get();
        return view('livewire.data-service.list-data-belum-service', [
            'pendaftarans' => pendaftaran::all(),
            'data_service' => $data_service
        ]);
    }

    public function store(){
        return view('livewire.data-service.store-data-service', [
            'data' => pendaftaran::all(),
            'data_sperpat' => data_sperpat::all()
        ]);
    }

    public function showCreate($id){
        $pendaftaran = pendaftaran::query()->where('id', $id)->first();
        $dataService = data_service::query()->where('id_pendaftaran', $id)->first();
        return view('livewire.data-service.store-data-service', [
            'dataService' => $dataService,
            'pendaftaran' => $pendaftaran,
            'data_sperpat' => data_sperpat::all()
        ]);
    }

    public function show($id){
        $pendaftaran = pendaftaran::query()->where('id', $id)->first();
        $dataService = data_service::query()->where('id_pendaftaran', $id)->first();
        return view('livewire.data-service.store-tindakan-service', [
            'dataService' => $dataService,
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function updateTindakService(Request $rq, $id){
        $payload = [
            'nama_mekanik' => $rq->input('nama_mekanik'),
            'kerusakan' => $rq->input('kerusakan')
        ];

        data_service::query()->where('id_pendaftaran', $id)->update($payload);
        return redirect(route('listDataBelumService'))->with('success', 'Data Tindak Service Berhasil Ditambahkan');
    }

    public function update(Request $rq, $id){
        $payload = [
            'nama_mekanik' => $rq->input('nama_mekanik'),
            'jasa_service' => $rq->input('jasa_service'),
        ];

        $total_sperpat = "";

        $total_harga_sperpat = 0;
        foreach($rq->input('sperpat') as $key => $value){

            if($value){
                $total_harga_sperpat += $value;
                $total_sperpat = $total_sperpat . $key . ", ";
            }
        }

        if($total_sperpat != ""){
            $total_sperpat = substr($total_sperpat, 0, strlen($total_sperpat)-2);
        }

        $harga_total = $total_harga_sperpat + $rq->input('jasa_service');
        $harga_total = [
            'total_harga' => $harga_total
        ];

        $payload['listSperpat'] = $total_sperpat;
        $payload['harga_total'] = $total_harga_sperpat;

        data_service::where('id_pendaftaran', $id)->update($payload);
        pendaftaran::where('id', $id)->update($harga_total);
        return redirect(route('listDataService'));
    }

    public function delete($id){
        $data_service = data_service::query()->where('id_pendaftaran', $id)->first();
        $data_service->delete();
        return redirect()->back();
    }
}
