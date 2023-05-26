<?php

use App\Http\Controllers\BangunanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\SubMisionController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\TrxSaranaController;
use App\Http\Controllers\TrxRuangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiController;
use App\Models\TahunAkademik;
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

Route::get('/renderpdf', function () {
    return view('superadmin.testpdf');
});
Route::get('/visimisiti', [LandingPageController::class, 'GetVisiMisiTI']);
Route::get('/visimisisi', [LandingPageController::class, 'GetVisiMisiSI']);
Route::get('/all_visi_misi', [LandingPageController::class, 'GetAll']);

Route::get('/', [UserController::class, 'GetLogin'])->name('viewlogin');
Route::get('/logout', [UserController::class, 'Logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'ViewDashboard'])->name('dashboard');

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

Route::prefix('trxsarana')->group(function () {
    Route::get('/', [TrxSaranaController::class, 'GetTrxSarana'])->name('gettrxsarana');
    Route::post('/addtrxsarana', [TrxSaranaController::class, 'AddTrxSarana'])->name('addtrxsarana');
    Route::post('/updttrxsarana', [TrxSaranaController::class, 'UpdtTrxSarana'])->name('updttrxsarana');
    Route::get('/delete/{id}', [TrxSaranaController::class, 'Delete'])->name('delete');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'GetUser'])->name('getuser');
    Route::post('/login', [UserController::class, 'Auth'])->name('login');
    Route::post('/register', [UserController::class, 'Register'])->name('register');
    Route::post('/update', [UserController::class, 'UpdateUs'])->name('update');
    Route::get('/delete/{id}', [UserController::class, 'Delete'])->name('delete');
});

Route::prefix('tahun_akademik')->group(function () {
    Route::get('/', [TahunAkademikController::class, 'GetTahunAkademik'])->name('tahun_akademik');
    Route::post('/add_tahun_akademik', [TahunAkademikController::class, 'AddTahunAkademik'])->name('add_tahun_akademik');
    Route::post('/update_tahun_akademik', [TahunAkademikController::class, 'UpdateTahunAkademik'])->name('update_tahun_akademik');
    Route::get('/delete_tahun_akademik/{id}', [TahunAkademikController::class, 'DeleteTahunAkademik'])->name('delete_tahun_akademik');
});
Route::prefix('program_studi')->group(function () {
    Route::get('/', [ProgramStudiController::class, 'GetProgramStudi'])->name('program_studi');
    Route::post('/addprogramstudi', [ProgramStudiController::class, 'AddProgramStudi'])->name('addprogramstudi');
    Route::post('/updateprogramstudi', [ProgramStudiController::class, 'UpdateProgramStudi'])->name('updateprogramstudi');
    Route::get('/deleteprogramstudi/{id}', [ProgramStudiController::class, 'DeleteProgramStudi'])->name('deleteprogramstudi');
});

Route::prefix('visi')->group(function () {
    Route::get('/', [VisiController::class, 'GetVisi'])->name('visi');
    Route::post('/addvisi', [VisiController::class, 'AddVisi'])->name('addvisi');
    Route::post('/updatevisi', [VisiController::class, 'UpdateVisi'])->name('updatevisi');
    Route::get('/deletevisi/{id}', [VisiController::class, 'DeleteVisi'])->name('deletevisi');
});
Route::prefix('misi')->group(function () {
    Route::get('/', [MisiController::class, 'GetMisi'])->name('misi');
    Route::post('/addmisi', [MisiController::class, 'AddMisi'])->name('addmisi');
    Route::post('/updatemisi', [MisiController::class, 'UpdateMisi'])->name('updatemisi');
    Route::get('/deletemisi/{id}', [MisiController::class, 'DeleteMisi'])->name('deletemisi');
});
Route::prefix('sub_misi')->group(function () {
    Route::get('/', [SubMisionController::class, 'GetSubMisi'])->name('sub_misi');
    Route::post('/addsubmisi', [SubMisionController::class, 'AddSubMisi'])->name('addsubmisi');
    Route::post('/updatesubmisi', [SubMisionController::class, 'UpdateSubMisi'])->name('updatesubmisi');
    Route::get('/deletesubmisi/{id}', [SubMisionController::class, 'DeleteSubMisi'])->name('deletesubmisi');
});
