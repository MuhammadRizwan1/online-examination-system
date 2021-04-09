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

Route::get('/admin/manage_exam', [App\Http\Controllers\Admin::class, 'manage_exam'])->name('manage_exam'); 

Route::post('/admin/add_new_exam', [App\Http\Controllers\Admin::class, 'add_new_exam']);

Route::get('/admin/exam_status/{id}', [App\Http\Controllers\Admin::class, 'exam_status'])->name('exam_status');
Route::get('/admin/student_status/{id}', [App\Http\Controllers\Admin::class, 'student_status'])->name('student_status');

Route::get('/admin/delete_exam/{id}', [App\Http\Controllers\Admin::class, 'delete_exam'])->name('delete_exam');
Route::get('/admin/edit_exam/{id}', [App\Http\Controllers\Admin::class, 'edit_exam'])->name('edit_exam');   
Route::post('/admin/edit_new_exam', [App\Http\Controllers\Admin::class, 'edit_new_exam'])->name('edit_new_exam');  

Route::get('/admin/manage_students', [App\Http\Controllers\Admin::class, 'manage_students'])->name('manage_students');
Route::post('/admin/add_new_student', [App\Http\Controllers\Admin::class, 'add_new_student']);