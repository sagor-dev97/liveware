<?php

use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Settings\Profile;
use App\Livewire\Admin\Layouts\Dashboard;
use App\Livewire\Admin\Layouts\Category\Index;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin.session')->group(function () {
    Route::get('/admin', function () {
        return view('admin.app');
    })->name('admin.dashboard');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/category', Index::class)->name('category');
    Route::get('/profile', Profile::class)->name('profile');
});


