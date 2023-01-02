<?php

namespace App\Http\Controllers;

use App\Models\data_service;
use App\Models\pendaftaran;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    public function index(){
        if($users = session()->get('id_user')){
            $pendaftaran =  pendaftaran::query()->where('user_id', $users)->get();
            return view('livewire.pendaftaran.list-pendaftaran', [
                'pendaftaran' => $pendaftaran,
            ]);
        }else{
            $pendaftaran = pendaftaran::query()->get();
            return view('livewire.pendaftaran.list-pendaftaran', [
                'pendaftaran' => $pendaftaran
            ]);
        }
    }

    public function konfirmasi($id){
        $konfirmasi = pendaftaran::query()->where('id', $id)->first();
        $konfirmasi->update(['status' => 'Telah Dikonfirmasi']);
        return redirect(route('listPendaftaran'))->with('success', 'Konfirmasi Berhasil');
    }

    public function selesai($id){
        $konfirmasi = pendaftaran::query()->where('id', $id)->first();
        $konfirmasi->update(['status' => 'Service Selesai']);
        return redirect(route('listPendaftaran'))->with('success', 'Service Selesai');
    }

    public function store(){
        return view('livewire.pendaftaran.store-pendaftaran');
    }

    public function create(Request $rq){
        $rules = [
            'nama' => 'required',
            'alamat' => 'required|min:10',
            'no_handphone' => 'required|min:12|numeric',
            'gender' => 'required',
            'no_kendaraan' => 'required',
            'merek_kendaraan' => 'required',
            'model_kendaraan' => 'required',
            'kerusakan' => 'required',
            'photo_kendaraan' => 'required'
        ];

        $message = [
            'nama.required' => 'Nama Harus Di Isi',
            'alamat.required' => 'Alamat Harus Di Isi',
            'alamat.min' => 'Masukan Alamat Lengkap',
            'no_handphone.required' => 'No Handphone Harus Di Isi',
            'no_handphone.numeric' => 'No Handphone Harus Berupa Number',
            'no_handphone.min' => 'No Handphone Harus 12 Karakter',
            'gender.required' => 'Gender Harus Di Isi',
            'no_kendaraan.required' => 'No Kendaraan Harus Di Isi',
            'merek_kendaraan.required' => 'Merek Kendaraan Harus Di Isi',
            'model_kendaraan.required' => 'Model Kendaraan Harus Di Isi',
            'kerusakan.required' => 'Kerusakan Harus Di Isi',
            'photo_kendaraan.required' => 'Photo Kendaraan Harus Di Isi',


        ];
        $validated = Validator::make($rq->all(), $rules, $message);

        if($validated->fails()){
            return redirect(route('storePendaftaran'))->withErrors($validated)->withInput($rq->all());

        }
        $data = $validated->validated();

        if($rq->hasFile('photo_kendaraan')){
            $data['photo_kendaraan'] = $rq->file('photo_kendaraan')->store('image', 'public');
        }

        $data['status'] = 'Menunggu Konfirmasi';
        $data['user_id'] = session()->get('id_user');
        $pendaftarans = pendaftaran::query()->create($data);
        $service = ['id_pendaftaran' => $pendaftarans->id ];
        data_service::query()->create($service);
        return redirect(route('listPendaftaran'))->with('success', 'Pendaftaran Berhasil');
    }

    public function showupdate($id){
        $pendaftaran = pendaftaran::query()->where('user_id', $id)->first();
        return view('livewire.pendaftaran.upadte-pendaftaran', [
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function detail($id){
        $pendaftaran = pendaftaran::query()->where('id', $id)->first();
        $dataService = data_service::query()->where('id_pendaftaran', $pendaftaran->id)->first();
        return view('livewire.pendaftaran.detail-hasil-service',[
            'pendaftaran' => $pendaftaran,
            'dataService' => $dataService
        ]);
    }

    public function update(Request $rq, $id){
        $pendaftaran = [
            'nama' => $rq->input('nama'),
            'alamat' => $rq->input('alamat'),
            'no_handphone' => $rq->input('no_handphone'),
            'gender' => $rq->input('gender'),
            'no_kendaraan' => $rq->input('no_kendaraan'),
            'merek_kendaraan' => $rq->input('merek_kendaraan'),
            'model_kendaraan' => $rq->input('model_kendaraan'),
            'kerusakan' => $rq->input('kerusakan'),
        ];

        if($rq->hasFile('photo_kendaraan')){
            Storage::disk('public')->delete(pendaftaran::find($id)->first()->photo_kendaraan);
            $pendaftaran ['photo_kendaraan'] = $rq->photo_kendaraan->store('image', 'public');
        }

        pendaftaran::query()->where('user_id', $id)->update($pendaftaran);
        return redirect(route('listPendaftaran'));

    }

    public function delete($id){
        $pendaftaran = pendaftaran::query()->where('id', $id)->first();
        $pendaftaran->delete();
        Storage::disk('public')->delete($pendaftaran->photo_kendaraan);
        return redirect()->back();
    }
}
