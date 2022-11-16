<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController as Ship;

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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('ship')->name('ship_')->group(function () {
    Route::get('/', [Ship::class, 'index'])->name('index');
    Route::get('/create', [Ship::class, 'create'])->name('create');
    Route::post('/create', [Ship::class, 'store'])->name('store');
    Route::get('/show/{ship}', [Ship::class, 'show'])->name('show');
    Route::delete('/delete/{ship}', [Ship::class, 'destroy'])->name('delete');
    Route::get('/edit/{ship}', [Ship::class, 'edit'])->name('edit');
    Route::put('/edit/{ship}', [Ship::class, 'update'])->name('update');
});
