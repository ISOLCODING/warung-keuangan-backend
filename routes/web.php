<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\DashboardController as WebDashboardController;
use App\Http\Controllers\Web\ProductController as WebProductController;
use App\Http\Controllers\Web\TransactionController as WebTransactionController;

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

// Auth routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Web Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [WebDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/products', [WebProductController::class, 'index'])->name('admin.products');
        Route::get('/admin/transactions', [WebTransactionController::class, 'index'])->name('admin.transactions');
        Route::get('/admin/reports', [WebDashboardController::class, 'reports'])->name('admin.reports');
    });

    // Kasir Web Routes
    Route::middleware(['role:kasir'])->group(function () {
        Route::get('/kasir/pos', [WebTransactionController::class, 'pos'])->name('kasir.pos');
        Route::get('/kasir/transactions', [WebTransactionController::class, 'kasirTransactions'])->name('kasir.transactions');
    });
});

require __DIR__.'/auth.php';
