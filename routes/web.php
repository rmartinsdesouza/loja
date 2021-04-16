<?php

use App\Http\Controllers\ClienteController;
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
Route::middleware(['auth'])->group(function (){

    Route::any('/cliente/search', [
        ClienteController::class, 'search'
    ])->name('cliente.search');
    
    Route::get('/cliente', [
        ClienteController::class, 'index'
    ])->name('cliente.index')->middleware(['auth']);
    
    // Create deve ficar antes do get cliente/id senão ele entende que o paramentro {id} e o create
    Route::get('/cliente/create', [
        ClienteController::class, 'create'
    ])->name('cliente.create');
    
    Route::post('/cliente/store', [
        ClienteController::class, 'store'
    ])->name('cliente.store');
    
    Route::get('/cliente/{id}', [
        ClienteController::class, 'show'
    ])->name('cliente.show');
    
    Route::delete('/cliente/{id}', [
        ClienteController::class, 'destroy'
    ])->name('cliente.destroy');
    
    Route::get('/cliente/edit/{id}', [
        ClienteController::class, 'edit'
    ])->name('cliente.edit');
    
    Route::put('/cliente/{id}', [
        ClienteController::class, 'update'
    ])->name('cliente.update');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
