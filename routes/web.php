<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\GeneralLedgerCodeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/accounting', [AccountingController::class, 'index'])->name('accounting.index');
    Route::post('/accounting', [AccountingController::class, 'store'])->name('accounting.store');

    Route::get('/glcodes', [GeneralLedgerCodeController::class, 'index'])->name('glcodes.index');
    Route::post('/glcodes', [GeneralLedgerCodeController::class, 'store'])->name('glcodes.store');
});

require __DIR__.'/auth.php';
