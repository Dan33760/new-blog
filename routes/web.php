<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VisiteurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [VisiteurController::class, 'allPosts'])->name('accueil');
Route::get('/detail/{id}', [VisiteurController::class, 'singlePost'])->name('detail');
Route::post('/add-comment/{id}', [VisiteurController::class, 'addComment'])->name('add-comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/category-all', [CategoryController::class, 'index'])->name('category-all');
    Route::get('/category-add', [CategoryController::class, 'add'])->name('category-add');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('category-store');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('category-update');
    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('category-delete');

    Route::get('/post-all', [PostController::class, 'index'])->name('post-all');
    Route::get('/post-add', [PostController::class, 'add'])->name('post-add');
    Route::post('/post-store', [PostController::class, 'store'])->name('post-store');
    Route::get('/post-edit/{id}', [PostController::class, 'edit'])->name('post-edit');
    Route::post('/post-update/{id}', [PostController::class, 'update'])->name('post-update');
    Route::get('/post-delete/{id}', [PostController::class, 'delete'])->name('post-delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
