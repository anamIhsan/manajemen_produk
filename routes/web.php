<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('pages.dashboard.index');
})->name('dashboard.index');


Route::prefix('produk')->as('produk.')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('index');

        Route::get('/form-create', [ProdukController::class, 'formCreate'])->name('form-create');
        Route::post('/create', [ProdukController::class, 'create'])->name('create');

        Route::get('/form-update/{produk}', [ProdukController::class, 'formUpdate'])->name('form-update');
        Route::put('/update/{produk}', [ProdukController::class, 'update'])->name('update');

        Route::delete('/delete/{produk}', [ProdukController::class, 'delete'])->name('delete');
});

Route::prefix('user')->as('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/form-create', [UserController::class, 'formCreate'])->name('form-create');
        Route::post('/create', [UserController::class, 'create'])->name('create');

        Route::get('/form-update/{user}', [UserController::class, 'formUpdate'])->name('form-update');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('update');

        Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete');
});

Route::prefix('pesanan')->as('pesanan.')->group(function () {
        Route::get('/', [PesananController::class, 'index'])->name('index');

        Route::get('/form-create', [PesananController::class, 'formCreate'])->name('form-create');
        Route::post('/create', [PesananController::class, 'create'])->name('create');

        Route::get('/form-update/{pesanan}', [PesananController::class, 'formUpdate'])->name('form-update');
        Route::put('/update/{pesanan}', [PesananController::class, 'update'])->name('update');

        Route::delete('/delete/{pesanan}', [PesananController::class, 'delete'])->name('delete');
});
