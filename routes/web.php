<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\dataServiceController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/admin', function () {
    return view('livewire.admin.dasboard');
})->name('admin.dasbord');


Route::get('/', function () {
    return view('livewire.dasbord');
})->name('dasboard');

Route::get('/user',[UserController::class, 'home'])->name('home');
Route::get('/showregister',[UserController::class, 'showRegister'])->name('showRegister');
Route::post('/register',[UserController::class, 'register'])->name('register');
Route::any('/loginUser',[UserController::class, 'login'])->name('loginUser');


Route::any('/login',[AdminController::class, 'login'])->name('login');
Route::any('/logout',[AdminController::class, 'logout'])->name('logout');
Route::get('/listDataSperpat', [AdminController::class, "index"])->name('listDataSperpat')->middleware('isAdmin');
Route::get('/storeDataSperpat', [AdminController::class, "store"])->name('storDataSperpat')->middleware('isAdmin');
Route::get('/showDataSperpat/{id}', [AdminController::class, "showUpdate"])->name('showDataSperpat')->middleware('isAdmin');
Route::get('/deleteDataSperpat/{id}', [AdminController::class, "delete"])->name('deleteDataSperpat')->middleware('isAdmin');
Route::post('/createDataSperpat', [AdminController::class, "create"])->name('createDataSperpat')->middleware('isAdmin');
Route::put('/updateData/{id}', [AdminController::class, "update"])->name('updateDataSperpat')->middleware('isAdmin');


Route::get('/listPendaftaran', [PendaftaranController::class, 'index'])->name('listPendaftaran')->middleware('isUser');
Route::get('/storePendaftaran', [PendaftaranController::class, 'store'])->name('storePendaftaran')->middleware('isUser');
Route::get('/showUpdatePendaftaran/{id}', [PendaftaranController::class, 'showupdate'])->name('pendaftaranShowUpdate')->middleware('isUser');
Route::get('/deletePendaftaran/{id}', [PendaftaranController::class, 'delete'])->name('deletePendaftaran')->middleware('isUser');
Route::put('/updatePendaftaran/{id}', [PendaftaranController::class, 'update'])->name('pendaftaranUpdate')->middleware('isUser');
Route::any('/detailPendaftaran/{id}', [PendaftaranController::class, 'detail'])->name('detailPendaftaran')->middleware('isUser');
Route::post('/createPendaftaran', [PendaftaranController::class, 'create'])->name('createPendaftaran')->middleware('isUser');
Route::post('/konfirmasi/{id}', [PendaftaranController::class, 'konfirmasi'])->name('konfirmasiPendaftaran')->middleware('isUser');
Route::post('/selesai/{id}', [PendaftaranController::class, 'selesai'])->name('selesai')->middleware('isUser');



Route::get('/listDataService', [dataServiceController::class, 'index'])->name('listDataService')->middleware('isMekanik');
Route::get('/listDataBelumService', [dataServiceController::class, 'list'])->name('listDataBelumService')->middleware('isMekanik');
Route::get('/storedataService/{id}', [dataServiceController::class, 'showCreate'])->name('storeDataService')->middleware('isMekanik');
Route::get('/deleteDataService/{id}', [dataServiceController::class, 'delete'])->name('deleteDataService')->middleware('isMekanik');
Route::get('/storeTindakService/{id}', [dataServiceController::class, 'show'])->name('storeTindakService')->middleware('isMekanik');
Route::post('/createDataService/{id}', [dataServiceController::class, 'update'])->name('createdataService')->middleware('isMekanik');
Route::post('/updateTindakService/{id}', [dataServiceController::class, 'updateTindakService'])->name('updateTindakService')->middleware('isMekanik');


