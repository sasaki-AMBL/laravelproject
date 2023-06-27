<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ECController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){

Route::get('/',[ECController::class,'index'])->name('user.index');
Route::get('/history',[ECController::class, 'history'])->name('user.history');
Route::get('/{id}',[ECController::class,'show'])->name('user.show');
Route::post('/',[ECController::class, 'store'])->name('user.store');
});
