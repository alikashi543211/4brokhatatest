<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StatementController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/statement/{statement}', [HomeController::class, 'show'])->name('statement.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('statements', StatementController::class);

        Route::post('statements/{statement}/transactions', [TransactionController::class, 'store'])
            ->name('transactions.store');
        Route::put('transactions/{transaction}', [TransactionController::class, 'update'])
            ->name('transactions.update');
        Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy'])
            ->name('transactions.destroy');

        Route::middleware('super.admin')->resource('users', AdminUserController::class)->except(['show']);
    });
});
