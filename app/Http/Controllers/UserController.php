<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegister(){
        return view('livewire.user.register');
    }

    public function register(Request $rq) {

        $rules = [
            'nama' =>'required',
            'email' =>'required|unique:user,email',
            'username' =>'required|min:8',
            'password' => 'required|min:8|unique:user,password'
        ];

        $message = [
            'nama.required' => 'Nama Harus Di Isi',
            'email.required' => 'Email Harus Di Isi',
            'email.unique' => 'Email Sudah Terdaftar',
            'username.required' => 'Username Harus Di Isi',
            'username.min' => 'Username Minimal 8 Karakter',
            'password.required' => 'Password Harus Di Isi',
            'password.min' => 'Password Minimal 8 Karakter'
        ];

        $validated = Validator::make($rq->all(), $rules, $message);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }

        $data = $validated->validate();

        Users::query()->create($data);
        return redirect(route('loginUser'))->with('success', 'Register Berhasil');
    }

    public function login(Request $rq){
        if($rq->method() == "GET"){
            return view('livewire.user.login');
        }

        $username = $rq->input('username');
        $email = $rq->input('email');
        $password = $rq->input('password');

        $users = Users::query()->where('username', $username)->first();
        if($users == null) {
            return redirect()->back()->withErrors([
                "message" => "Username Salah"
            ]);
        }

        $users = Users::query()->where('email', $email)->first();
        if($users == null) {
            return redirect()->back()->withErrors([
                "message" => "Email Tidak ditemukan"
            ]);
        }

        if(!Hash::check($password, $users->password)){
            return redirect()->back()->withErrors([
                "message" => "Password Salah"
            ]);
        }

        if(!session()->isStarted()) session()->start();
            session()->put("logged", "yes", true);
            session()->put('id_user', $users->id);
            return redirect(route('home'));
    }

    public function home(){
        $users = Users::query()->where('id', session()->get('id_user'))->first();
        return view('livewire.home', [
            'user' => $users
        ]);
    }

    public function logout(){
        session()->flush();
        return redirect(route('dasboard'));
    }

}
