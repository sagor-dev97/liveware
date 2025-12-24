<?php

use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', function () {
    return view('layouts.app', [
        'slot' => app(\App\Livewire\ProductForm::class)->render()->with('products', \App\Models\Product::with('category')->latest()->get())->render()
    ]);
})->name('products.index');