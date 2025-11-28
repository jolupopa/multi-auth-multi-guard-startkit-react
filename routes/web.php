<?php

use Inertia\Inertia;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('error403', function () {
    return Inertia::render('errors/error403');
})->name('error403');

Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

});

Route::middleware(['auth:web', 'verified','type:client'])->group(function () {
    Route::get('client/properties', [PropertyController::class, 'index'])->name('properties.index');
});

Route::middleware(['auth:web', 'verified','type:agent'])->group(function () {
    Route::get('agent/tasks', [TaskController::class, 'index'])->name('tasks.index');
});

Route::middleware(['auth:web', 'verified','type:company'])->group(function () {
    Route::get('company/teams', [TeamController::class, 'index'])->name('teams.index');
});

require __DIR__.'/settings.php';
