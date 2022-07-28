<?php

use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\PengembalianController;
use App\Http\Controllers\API\PetugasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//PETUGAS
Route::get('/petugas', [PetugasController:: class, 'index']);
Route::post('/petugas', [PetugasController:: class, 'store']);
Route::get('/petugas/{id}', [PetugasController:: class, 'show']);
Route::put('/petugas/{id}', [PetugasController::class, 'update']);
Route::delete('/petugas/{id}',[PetugasController:: class, 'delete']);

//anggota
Route::get('/anggota', [AnggotaController:: class, 'index']);
Route::post('/anggota', [AnggotaController:: class, 'store']);
Route::get('/anggota/{id}', [AnggotaController:: class, 'show']);
Route::put('/anggota/{id}', [AnggotaController::class, 'update']);
Route::delete('/anggota/{id}',[AnggotaController:: class, 'delete']);

//BUKU
Route::get('/buku', [BukuController:: class, 'index']);
Route::post('/buku', [BukuController:: class, 'store']);
Route::get('/buku/{id}', [BukuController:: class, 'show']);
Route::put('/buku/{id}', [BukuController::class, 'update']);
Route::delete('/buku/{id}',[BukuController:: class, 'delete']);

//peminjaman
Route::get('/peminjaman', [PeminjamanController:: class, 'index']);
Route::post('/peminjaman', [PeminjamanController:: class, 'store']);
Route::get('/peminjaman/{id}', [PeminjamanController:: class, 'show']);
Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update']);
Route::delete('/peminjaman/{id}',[PeminjamanController:: class, 'delete']);

//pengembalian
Route::get('/pengembalian', [PengembalianController:: class, 'index']);
Route::post('/pengembalian', [PengembalianController:: class, 'store']);
Route::get('/pengembalian/{id}', [PengembalianController:: class, 'show']);
Route::put('/pengembalian/{id}', [PengembalianController::class, 'update']);
Route::delete('/pengembalian/{id}',[PengembalianController:: class, 'delete']);



//login
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});