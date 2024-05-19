<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ItemController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Items Controller
Route::get('/createitem',[ItemController::class,'create'])->name('createitem');
Route::post('/storeitem',[ItemController::class,'store'])->name('storeitem');
Route::get('/item/{slug}',[ItemController::class,'view'])->name('viewitem');
Route::get('/item/{slug}/edit',[ItemController::class,'edit'])->name('edititem');
Route::put('/item/{slug}',[ItemController::class,'update'])->name('updateitem');
Route::delete('/item/{slug}',[ItemController::class,'delete'])->name('deleteitem');

// Categories Controller
Route::get('/category',[CategoryController::class, 'index'])->name('category');
Route::post('/storecategory',[CategoryController::class, 'store'])->name('storecategory');
Route::get('/category/{slug}/edit',[CategoryController::class,'edit'])->name('editcategory');
Route::put('/category/{slug}',[CategoryController::class,'update'])->name('updatecategory');
Route::delete('/category/{slug}',[CategoryController::class,'delete'])->name('deletecategory');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
