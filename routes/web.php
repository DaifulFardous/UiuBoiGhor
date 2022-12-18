<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//users
Route::get('donate', [App\Http\Controllers\DonateController::class, 'donate'])->name('donate')->middleware('auth');
Route::post('insert-donate', [App\Http\Controllers\DonateController::class, 'insert'])->name('insert-donate')->middleware('auth');


Route::middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard', function () {
        return view('admin.index');
     });
     //category_routes
     Route::get('categories',[App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
     Route::get('add-category',[App\Http\Controllers\CategoryController::class, 'addCategory'])->name('add-category');
     Route::post('insert-category',[App\Http\Controllers\CategoryController::class, 'insert'])->name('insert-category');
     Route::get('edit-category/{id}',[App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category');
     Route::post('update-category/{id}',[App\Http\Controllers\CategoryController::class, 'update'])->name('update-category');
     Route::get('delete-category/{id}',[App\Http\Controllers\CategoryController::class, 'distroy'])->name('delete-category');

     //book_routes
     Route::get('books',[App\Http\Controllers\BookController::class, 'index'])->name('books');
     Route::get('add-book',[App\Http\Controllers\BookController::class, 'addBook'])->name('add-book');
     Route::post('insert-book',[App\Http\Controllers\BookController::class, 'insert'])->name('insert-book');
     Route::get('edit-book/{id}',[App\Http\Controllers\BookController::class, 'edit'])->name('edit-book');
     Route::put('update-book/{id}',[App\Http\Controllers\BookController::class, 'update'])->name('update-book');
     Route::get('delete-book/{id}',[App\Http\Controllers\BookController::class, 'distroy'])->name('delete-book');
 });