<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Homepage Route
Route::get('/', [InvoiceController::class, 'index'])->name('homepage');

Route::get('/homepage', [InvoiceController::class, 'index'])->name('homepage');

// Invoice Item Routes
Route::post('/invoice-items', [InvoiceItemController::class, 'store'])->name('invoice-items.store');

// Invoice Routes
Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::put('/invoice/update/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');

// Authentication Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Invoice Add Route
Route::get('/invoice/add', [InvoiceController::class, 'add'])->name('invoice.add');

// Export Invoices Route
Route::get('/export-invoices', [InvoiceController::class, 'exportInvoices'])->name('export.invoices');
Route::get('/download-reports/{id}', [InvoiceController::class, 'downloadReports'])->name('report.download');


// Auth::routes();
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/homepage', [App\Http\Controllers\InvoiceController::class, 'index'])->name('homepage');
