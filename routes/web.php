<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Tasks;
use Livewire\Livewire;

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/college-todo-list/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::get('/college-todo-list/public/livewire/update', $handle);
});

Route::get('/', Tasks::class)->name("tasks");
