<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\Admin::class, 'index'])->name('admin-home');

Route::get('/admin/exam_category', [App\Http\Controllers\Admin::class, 'exam_category'])->name('exam_category');

Route::post('/admin/add_new_category', [App\Http\Controllers\Admin::class, 'add_new_category'])->name('admin-home');

Route::get('/admin/delete_category/{id}', [App\Http\Controllers\Admin::class, 'delete_category'])->name('delete_category');

Route::get('/admin/edit_category/{id}', [App\Http\Controllers\Admin::class, 'edit_category'])->name('edit_category');   


Route::post('/admin/edit_new_category', [App\Http\Controllers\Admin::class, 'edit_new_category'])->name('edit_new_category');

Route::get('/admin/category_status/{id}', [App\Http\Controllers\Admin::class, 'category_status'])->name('category_status');