<?php

use App\Http\Controllers\CostumerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KostContoller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\SewaTahunanController;
use App\Http\Controllers\TransactionAdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTahunanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['admin:1'])->group(function () {
    
    Route::get('/dashboard', [KostContoller::class, 'dashboard'])->name('dashboard');
    
    Route::prefix('kost')->group(function () {
        Route::controller(KostContoller::class)->name('admin.')->group(function () {
            Route::get('/index', 'index')->name('kost.index');
            Route::get('/create', 'create')->name('kost.create');
            Route::post('/store', 'store')->name('kost.store');
            Route::get('/edit/{id}', 'edit')->name('kost.edit');
            Route::put('/update/{id}', 'update')->name('kost.update');
            Route::delete('/delete/{id}', 'destroy')->name('kost.delete');
            Route::get('/serach/{status?} ', 'search')->name('kost.serach');
        });
    });
    
    Route::prefix('costumer')->group(function () {
        Route::controller(CostumerController::class)->name('admin.')->group(function () {
            Route::get('/', 'index')->name('costumer.index');
            Route::get('/show/{id}', 'show')->name('costumer.show');
            Route::delete('/delete/{user}', 'delete')->name('costumer.delete');
            Route::get('/Laporan','laporan')->name('costumer.laporan');
            Route::get('/Print','print')->name('costumer.print');
        });
    });

    Route::get('/Transaction/Perbulan',[TransactionAdminController::class, 'Perbulan'])->name('Transaction.Perbulan');
    Route::get('/Transaction/Pertahun',[TransactionAdminController::class, 'Pertahun'])->name('Transaction.Pertahun');
    Route::put('/Transaction/Konfirmasi-bulanan/{id}',[TransactionAdminController::class, 'Konfirmasi_bulanan'])->name('konfirmasi.bulanan');
    Route::put('/Transaction/Konfirmasi-tahunan/{id}',[TransactionAdminController::class, 'Konfirmasi_tahunan'])->name('konfirmasi.tahunan');
    Route::get('/Transaction/Bulanan',[TransactionAdminController::class, 'pageslaporanbulanan'])->name('pageslaporanbulanan');
    Route::get('/Transaction/Laporan-Bulanan',[TransactionAdminController::class,'PrintLaporanBulanan'])->name('print.bulanan');
    Route::get('/Transaction/Page-Laporan-Tahunan',[TransactionAdminController::class, 'pageslaporantahunan'])->name('pageslaporantahunan');
    Route::get('/Transaction/Laporan-Tahunan',[TransactionAdminController::class,'PrintLaporanTahunan'])->name('print.tahunan');

});
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/List', [HomeController::class, 'list'])->name('list');
    Route::get('/Detail/{id}', [HomeController::class, 'detail'])->name('detail');
    
    Route::controller(CostumerController::class)->name('user.')->group(function () {
        Route::get('/create', 'create')->name('costumer.create');
        Route::post('/store', 'store')->name('costumer.store');
        Route::get('/edit/{id}', 'edit')->name('costumer.edit');
        Route::put('/update/{id}', 'update')->name('costumer.update');
    });

    
    #sewa Bulanan
    Route::get('/sewa-bulanan/{id}',[SewaController::class, 'sewa'])->name('sewa');
    Route::post('/sewa-bulanan/store',[SewaController::class, 'sewaPerbulan'])->name('sewaPerbulanStore');
    Route::get('/Edit-Sewa-Bulanan/{id}',[SewaController::class, 'pageupdatesewa'])->name('PageSewaUpdate');
    Route::put('/Sewa-Update-Bulan/{id}',[SewaController::class,'updatesewa'])->name('sewaUpdate');
    
    #transactions Bulanan
    Route::get('/transaksi-bulanan', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi-bulanan/pembayaran/{id}',[TransactionController::class,'pembayaran'])->name('transaksi.Pembayaran');
    Route::post('/pembayaran-bulanan/store/{id}',[TransactionController::class, 'storePembayaran'])->name('storePembayaran');
    Route::delete('/transaction-bulanan/delete/{id}',[TransactionController::class, 'destroy'])->name('deleteTransaction');
    Route::put('/transaction-bulanan/end/{id}',[TransactionController::class, 'end'])->name('endTransaction');
    
    #sewaTahunan
    Route::get('/sewa-tahunan/{id}',[SewaTahunanController::class, 'sewatahunan'])->name('sewa_tahunan');
    Route::post('/sewa-tahunan/store',[SewaTahunanController::class, 'storepertahun'])->name('sewaPertahunStore');
    Route::get('/Edit-Sewa-Tahunan/{id}',[SewaTahunanController::class, 'editpertahun'])->name('edit.pertahun');
    Route::put('/Update-Sewa-Tahunan/{id}',[SewaTahunanController::class,'updatepertahun'])->name('updatepertahun');
    
    #transactionsTahunan
    Route::get('/transaksi-tahunan', [TransactionTahunanController::class, 'pages'])->name('transaksi_tahunan');
    Route::get('/transaksi-tahunan/pembayaran/{id}',[TransactionTahunanController::class,'payment'])->name('pages.payment');
    Route::post('/pembayaran-tahunan/store/{id}',[TransactionTahunanController::class, 'storePayment'])->name('storePayment');
    Route::delete('/transaction-tahunan/delete/{id}',[TransactionTahunanController::class, 'destroy'])->name('delete_transaction');
    Route::put('/transaction-tahunan/end/{id}',[TransactionTahunanController::class, 'End'])->name('endTransactionTahunan');
});


