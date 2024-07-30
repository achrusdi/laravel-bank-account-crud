<?php

// use App\Http\Controllers\BankAccountController;

use App\Http\Controllers\BankAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::prefix('bank-accounts')->controller(BankAccountController::class)->group(function() {
    //     Route::get('/', 'index')->name('bank-accounts.index');
    // });
    // Route::resource('bank-accounts', BankAccountController::class);
    // Route::get('/bank-accounts', \App\Livewire\BankAccounts\Index::class)->name('bank-accounts.index');
    // Route::get('/bank-accounts/create', \App\Livewire\BankAccounts\Create::class)->name('bank-accounts.create');
    // Route::get('/bank-accounts/show/{bankAccount}', \App\Livewire\BankAccounts\Show::class)->name('bank-accounts.show');
    // Route::get('/bank-accounts/update/{bankAccount}', \App\Livewire\BankAccounts\Edit::class)->name('bank-accounts.edit');

    Route::resource('bank-accounts', BankAccountController::class)->names([
        'index' => 'bank-accounts.index',
        'create' => 'bank-accounts.create',
        'store' => 'bank-accounts.store',
        'show' => 'bank-accounts.show',
        'edit' => 'bank-accounts.edit',
        'update' => 'bank-accounts.update',
        'destroy' => 'bank-accounts.destroy',
    ]);
});
