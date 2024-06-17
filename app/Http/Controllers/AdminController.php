<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\data_sperpat;
use App\Models\pendaftaran;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $rq){
        if($rq->method() == "GET"){
            return view('login');
        }

        $usernmae = $rq->input('username');
        $email = $rq->input('email');
        $password = $rq->input('password');
        $role = $rq->input('role_id');

        $admin = Admin::query()->where('username', $usernmae)->first();
        if($admin == null) {
            return redirect()->back()->withErrors([
                "message" => "Username Salah"
            ]);
        }

        $admin = Admin::query()->where('email', $email)->first();
        if($admin == null) {
            return redirect()->back()->withErrors([
                "message" => "Email Tidak ditemukan"
            ]);
        }

        if(!Hash::check($password, $admin->password)){
            return redirect()->back()->withErrors([
                "message" => "Password Salah"
            ]);
        }

        $role = Admin::query()->where('role_id', $role)->first();

        if(!session()->isStarted()) session()->start();
            session()->put("logged", "yes", true);
            if($role['role_id'] == 2){
                session()->put('idRoleAdmin', $role->role_id);
            }elseif($role['role_id'] == 3) {
                session()->put('idRoleMekanik', $role->role_id);
            }
            return redirect(route('admin.dasbord'));

    }

    public function logout(){
        session()->flush();
        return redirect(route('dasboard'));
    }

    public function index(){
        $data_sperpat = data_sperpat::query()->get();
        return view('livewire.sperpat.list-data-sperpat', [
            'data_sperpat' => $data_sperpat
        ]);
    }

    public function store(){
        return view('livewire.sperpat.store-data-sperpat');
    }

    function create(Request $rq){
        $payload = [
            'nama_sperpat' => $rq->input('nama_sperpat'),
            'jumlah' => $rq->input('jumlah'),
            'harga_sperpat' => $rq->input('harga_sperpat')
        ];

        data_sperpat::query()->create($payload);
        return redirect(route('listDataSperpat'))->with('success','Data Sperpat Success Di Tambahkan');
    }

    function showUpdate($id){
        $dataSperpat = data_sperpat::query()->where('id', $id)->first();
        return view('livewire.sperpat.update-data-sperpat', [
            'dataSperpat' => $dataSperpat
        ]);
    }

    function update(Request $rq, $id){
        $payload = [
            'nama_sperpat' => $rq->input('nama_sperpat'),
            'jumlah' => $rq->input('jumlah'),
            'harga_sperpat' => $rq->input('harga_sperpat')
        ];
        data_sperpat::query()->where('id', $id)->update($payload);
        return redirect(route('listDataSperpat'))->with('success', 'Data Sperpat Success Di Update');
    }

    public function delete($id){
        $pendaftaran = data_sperpat::query()->where('id', $id)->first();
        $pendaftaran->delete();
        return redirect()->back();
    }
}
