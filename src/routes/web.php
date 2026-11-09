<?php

use App\Http\Controllers\HealthController;
use App\Livewire\TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/', TaskManager::class)->name('tasks');
Route::get('/health', HealthController::class)->name('health');
