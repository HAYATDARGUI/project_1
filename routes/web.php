<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\ReceptionsController;
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
    return view('dashboard');
})->name('dashboard');
Route::get('/clients', [ClientsController::class,'index'])->name('clients');
Route::get('/clients/create',  [ClientsController::class,'create'])->name('clients.create');
Route::post('/clients/store',  [ClientsController::class,'store'])->name('clients.store');
Route::get('modifier/{id}',  [ClientsController::class,'modification'])->name('clients.modifier');
Route::put('/update/clients/{id}',  [ClientsController::class,'update'])->name('clients.update');
Route::delete('/delete/clients/{id}',  [ClientsController::class,'delete'])->name('clients.delete');

Route::get('/produits', [ProduitsController::class,'index'])->name('produits');
Route::get('/produits/create',  [ProduitsController::class,'create'])->name('produits.create');
Route::post('/produits/store',  [ProduitsController::class,'store'])->name('produits.store');
Route::get('edit/{id}',  [ProduitsController::class,'edit'])->name('produits.edit');
Route::put('/update/produits/{id}',  [ProduitsController::class,'update'])->name('produits.update');
Route::delete('/delete/produits/{id}',  [ProduitsController::class,'delete'])->name('produits.delete');

Route::get('/receptions', [ReceptionsController::class,'index'])->name('receptions');
Route::get('/receptions/create',  [ReceptionsController::class,'create'])->name('receptions.create');
Route::post('/receptions/store',  [ReceptionsController::class,'store'])->name('receptions.store');
Route::get('edition/{id}',  [ReceptionsController::class,'edition'])->name('receptions.edition');
Route::put('/update/receptions/{id}',  [ReceptionsController::class,'update'])->name('receptions.update');
Route::delete('/receptions/{id}', [ReceptionsController::class, 'delete'])->name('receptions.delete');
