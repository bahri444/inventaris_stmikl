<?php

use App\Http\Controllers\BangunanController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\TrxPeriodikController;
use App\Http\Controllers\TrxRuangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'GetLogin'])->name('viewlogin');
Route::get('/logout', [UserController::class, 'Logout'])->name('logout');

Route::prefix('tanah')->group(function () {
    Route::get('/', [TanahController::class, 'GetTanahBangunan'])->name('gettanahbangunan');
    Route::post('/addtanah', [TanahController::class, 'AddTanah'])->name('addtanah');
    Route::post('/updttanah', [TanahController::class, 'UpdtTanah'])->name('updttanah');
    Route::get('/delete/{id}', [TanahController::class, 'Delete'])->name('delete');

    Route::post('/addbangunan', [BangunanController::class, 'AddBangunan'])->name('addbangunan');
    Route::post('/updtbangunan', [BangunanController::class, 'UpdtBangunan'])->name('updtbangunan');
    Route::get('/deletebangunan/{id}', [BangunanController::class, 'Delete'])->name('delete');
});

Route::prefix('ruang')->group(function () {
    Route::get('/', [RuangController::class, 'GetRuang'])->name('getruang');
    Route::post('/addruang', [RuangController::class, 'AddRuang'])->name('addruang');
    Route::post('/updtruang', [RuangController::class, 'UpdtRuang'])->name('updtruang');
    Route::get('/delete/{id}', [RuangController::class, 'Delete'])->name('delete');
});

Route::prefix('sarana')->group(function () {
    Route::get('/', [SaranaController::class, 'GetSarana'])->name('getsarana');
    Route::post('/addsarana', [SaranaController::class, 'AddSarana'])->name('addsarana');
    Route::post('/updtsarana', [SaranaController::class, 'UpdtSarana'])->name('updtsarana');
    Route::get('/delete/{id}', [SaranaController::class, 'Delete'])->name('delete');
});

Route::prefix('trxruang')->group(function () {
    Route::get('/', [TrxRuangController::class, 'GetTrxRuang'])->name('gettrxruang');
    Route::post('/addtrxruang', [TrxRuangController::class, 'AddTrxRuang'])->name('addtrxruang');
    Route::post('/updttrxruang', [TrxRuangController::class, 'UpdtTrxRuang'])->name('updttrxruang');
    Route::get('/delete/{id}', [TrxRuangController::class, 'Delete'])->name('delete');
});

Route::prefix('trxperiodik')->group(function () {
    Route::get('/', [TrxPeriodikController::class, 'GetTrxPeriodik'])->name('gettrxperiodik');
    Route::post('/addtrxperiodik', [TrxPeriodikController::class, 'AddTrxPeriodik'])->name('addtrxperiodik');
    Route::post('/updttrxperiodik', [TrxPeriodikController::class, 'UpdtTrxPeriodik'])->name('updttrxperiodik');
    Route::get('/delete/{id}', [TrxPeriodikController::class, 'Delete'])->name('delete');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'GetUser'])->name('getuser');
    Route::post('/login', [UserController::class, 'Auth'])->name('login');
    Route::post('/register', [UserController::class, 'Register'])->name('register');
    Route::post('/update', [UserController::class, 'UpdateUs'])->name('update');
    Route::get('/delete/{id}', [UserController::class, 'Delete'])->name('delete');
});
