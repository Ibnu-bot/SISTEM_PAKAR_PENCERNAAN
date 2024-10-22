<?php

use App\Http\Controllers\admin\AnalisisPenyakitController;
use App\Http\Controllers\admin\AnalisisGejalaController;
use App\Http\Controllers\admin\DiagnosisController;
use App\Http\Controllers\admin\GejalaController;
use App\Http\Controllers\admin\HasilAnalisisController;
use App\Http\Controllers\admin\PasienController;
use App\Http\Controllers\admin\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\RuleController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\RandomIndexController;
use App\Http\Controllers\admin\RiwayatController;
use App\Http\Controllers\user\RiwayatDiagnosisController;
use App\Http\Controllers\user\UserDiagnosisController;
use App\Models\AnalisisPenyakit;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/diagnosis', [UserDiagnosisController::class, 'index'])->name('user.form.pasien');
    Route::post('/diagnosis/createpasien', [UserDiagnosisController::class, 'createPasien'])->name('user.create.pasien');
    Route::get('/diagnosis/pilihgejala', [UserDiagnosisController::class, 'pilihGejala'])->name('user.form.gejala');
    Route::post('/diagnosis/prosesdiagnosis', [UserDiagnosisController::class, 'prosesDiagnosis'])->name('user.proses.cf');
    Route::get('/diagnosis/hasildiagnosis', [UserDiagnosisController::class, 'hasilDiagnosis'])->name('user.hasil.diagnosis');
    Route::get('/diagnosis/cetak/{id}', [UserDiagnosisController::class, 'cetak'])->name('user.diagnosis.cetak');
    Route::get('/riwayatdiagnosis', [RiwayatDiagnosisController::class, 'riwayat'])->name('user.riwayat');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is.admin']], function () {
    route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Crud Users
    route::get('/users', [UsersController::class, 'index'])->name('users.index');
    route::get('/users/create', [UsersController::class, 'create'])->name('tambahusers.index');
    route::post('users/store', [UsersController::class, 'store'])->name('users.store');
    route::put('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    route::get('users/{id}', [UsersController::class, 'edit'])->name('users.edit');
    route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

    //crud penyakit
    route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
    route::get('/penyakit/create', [PenyakitController::class, 'create'])->name('tambahpenyakit.index');
    route::post('penyakit/store', [PenyakitController::class, 'store'])->name('penyakit.store');
    route::put('penyakit/update/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');
    route::get('penyakit/{id}', [PenyakitController::class, 'edit'])->name('penyakit.edit');
    route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');

    //crud gejala
    route::get('/gejala', [GejalaController::class, 'index'])->name('gejala.index');
    route::get('/gejala/create', [GejalaController::class, 'create'])->name('tambahgejala.index');
    route::post('gejala/store', [GejalaController::class, 'store'])->name('store.gejala');
    route::put('gejala/update/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    route::get('/gejala/{id}', [GejalaController::class, 'edit'])->name('gejala.edit');
    route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');

    //Crud Rule
    route::get('/rule', [RuleController::class, 'index'])->name('rule.index');
    route::get('/rule/create', [RuleController::class, 'create'])->name('tambahrule.index');
    route::post('rule/store', [RuleController::class, 'store'])->name('store.rule');
    route::put('/rule/update/{id}', [RuleController::class, 'update'])->name('rule.update');
    route::get('/rule/{id}', [RuleController::class, 'edit'])->name('rule.edit');
    route::delete('/rule/{id}', [RuleController::class, 'destroy'])->name('rule.destroy');

    // Crud Random Index
    route::get('/randomindex', [RandomIndexController::class, 'index'])->name('randomindex.index');
    route::get('/randomindex/create', [RandomIndexController::class, 'create'])->name('tambahrandomindex.index');
    route::post('randomindex/store', [RandomIndexController::class, 'store'])->name('store.randomindex');
    route::put('/randomindex/update/{id}', [RandomIndexController::class, 'update'])->name('randomindex.update');
    route::get('/randomindex/{id}', [RandomIndexController::class, 'edit'])->name('randomindex.edit');
    route::delete('/randomindex/{id}', [RandomIndexController::class, 'destroy'])->name('randomindex.destroy');

    // AHP-Analisis Penyakit
    route::get('/analisispenyakit', [AnalisisPenyakitController::class, 'index'])->name('analisispenyakit.index');
    Route::post('/analisispenyakit/store', [AnalisisPenyakitController::class, 'store'])->name('analisispenyakit.store');

    // AHP-Analisis Gejala
    Route::get('/select-penyakit', function () {
        $penyakits = \App\Models\Penyakit::all();
        return view('admin.analisisgejala.pilihpenyakit', compact('penyakits'));
    });
    Route::get('/analisisgejala', [AnalisisGejalaController::class, 'index'])->name('analisisgejala.index');
    Route::post('/analisisgejala/store', [AnalisisGejalaController::class, 'store'])->name('analisisgejala.store');

    // Hasil Analisis
    Route::get('/hasilanalisis', [HasilAnalisisController::class, 'index'])->name('hasil.analisis');

    //Diagnosis
    Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('form.pasien');
    Route::post('/diagnosis/createpasien', [DiagnosisController::class, 'createPasien'])->name('create.pasien');
    Route::get('/diagnosis/pilihgejala', [DiagnosisController::class, 'pilihGejala'])->name('form.gejala');
    Route::post('/diagnosis/prosesdiagnosis', [DiagnosisController::class, 'prosesDiagnosis'])->name('proses.cf');
    Route::get('/diagnosis/hasil-diagnosis', [DiagnosisController::class, 'hasilDiagnosis'])->name('hasil.diagnosis');
    Route::get('/diagnosis/cetakpdf/{id}', [DiagnosisController::class, 'cetakpdf'])->name('diagnosis.cetakpdf');

    //Riwayat
    Route::get('/data-diagnosis', [PasienController::class, 'index'])->name('data.diagnosis');
    Route::delete('data-diagnosis/{id}', [PasienController::class, 'destroy'])->name('data.diagnosis.destroy');
});
