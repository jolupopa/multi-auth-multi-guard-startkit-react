<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('client/properties', function () {
        return Inertia::render('client/properties');
    })->name('client.properties');

    Route::get('agent/tasks', function () {
        return Inertia::render('agent/tasks');
    })->name('agent.tasks');

    Route::get('company/agents', function () {
        return Inertia::render('company/agents');
    })->name('company.agents');
});

require __DIR__.'/settings.php';
