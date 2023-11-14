<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

Route::middleware('auth','user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //view invoice
    Route::get('/invoice',[InvoiceController::class,'viewinvoice'])->name('invoice');

    //delete 
    Route::delete('/deleteinvoice/{id}',[InvoiceController::class,'delete'])->name('deleteinvoice');
    //update invoice
    Route::post('/updateinvoice/{id}',[InvoiceController::class,'updateinvoice'])->name('updateinvoice');
    //calculate invoice
    Route::post('/calinvoice',[InvoiceController::class,'invoice'])->name('calinvoice');
});


// Route::middleware('auth','user')->group(function () {

// });


Route::view('/home','home')->name('home')->middleware('auth');




require __DIR__.'/auth.php';
