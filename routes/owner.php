<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:owners'])->name('dashboard');

Route::middleware('auth:owners')->name('item.')->prefix('item')
    ->group(function () {
        Route::get('/index', [ItemController::class, 'index'])->name('index');
        Route::get('/create', [ItemController::class, 'create'])->name('create');
        Route::get('/chartjs', [ItemController::class, 'chartjs'])->name('chartjs');
        Route::get('/{id}/edit', [ItemController::class, 'edit'])->name('edit');

        Route::post('/index', [ItemController::class, 'store'])->name('store');
        //Route::get('/chart-get', [ItemController::class, 'chartGet'])->name('chart-get');

        Route::post('/{id}', [ItemController::class, 'update'])->name('update');


    });


require __DIR__ . '/ownerAuth.php';
