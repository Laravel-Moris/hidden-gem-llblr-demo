<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Volt::route('dynamic-where-clauses', 'dynamic-where-clauses')
        ->name('dynamic-where-clauses');

    Volt::route('touching-parent-timestamps', 'touching-parent-timestamps')
        ->name('touching-parent-timestamps');

    Volt::route('retry-helper', 'retry-helper')
        ->name('retry-helper');

    Volt::route('rescue-helper', 'rescue-helper')
        ->name('rescue-helper');

    Volt::route('pipline', 'pipeline')
        ->name('pipeline');

    Volt::route('deferred-functions', 'deferred-functions')
        ->name('deferred-functions');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
