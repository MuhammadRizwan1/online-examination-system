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

/*Home Controller */ 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


/*Admin Controller */ 
Route::get('/admin', [App\Http\Controllers\Admin::class, 'index']);
Route::get('/admin/exam_category', [App\Http\Controllers\Admin::class, 'exam_category']);
Route::post('/admin/add_new_category', [App\Http\Controllers\Admin::class, 'add_new_category']);
Route::get('/admin/delete_category/{id}', [App\Http\Controllers\Admin::class, 'delete_category']);
Route::get('/admin/delete_portal/{id}', [App\Http\Controllers\Admin::class, 'delete_portal']);
Route::get('/admin/edit_category/{id}', [App\Http\Controllers\Admin::class, 'edit_category']);   
Route::post('/admin/edit_new_category', [App\Http\Controllers\Admin::class, 'edit_new_category']);
Route::get('/admin/category_status/{id}', [App\Http\Controllers\Admin::class, 'category_status']);
Route::get('/admin/manage_exam', [App\Http\Controllers\Admin::class, 'manage_exam']); 
Route::post('/admin/add_new_exam', [App\Http\Controllers\Admin::class, 'add_new_exam']);
Route::get('/admin/exam_status/{id}', [App\Http\Controllers\Admin::class, 'exam_status']);
Route::get('/admin/student_status/{id}', [App\Http\Controllers\Admin::class, 'student_status']);
Route::get('/admin/delete_exam/{id}', [App\Http\Controllers\Admin::class, 'delete_exam']);
Route::get('/admin/delete_student/{id}', [App\Http\Controllers\Admin::class, 'delete_student']);
Route::get('/admin/edit_exam/{id}', [App\Http\Controllers\Admin::class, 'edit_exam']); 
Route::get('/admin/edit_student/{id}', [App\Http\Controllers\Admin::class, 'edit_student']); 
Route::get('/admin/edit_portal/{id}', [App\Http\Controllers\Admin::class, 'edit_portal']); 
Route::post('/admin/edit_new_exam', [App\Http\Controllers\Admin::class, 'edit_new_exam']);  
Route::post('/admin/edit_new_portal', [App\Http\Controllers\Admin::class, 'edit_new_portal']); 
Route::post('/admin/edit_new_student', [App\Http\Controllers\Admin::class, 'edit_new_student']);  
Route::get('/admin/manage_students', [App\Http\Controllers\Admin::class, 'manage_students']);
Route::post('/admin/add_new_student', [App\Http\Controllers\Admin::class, 'add_new_student']);   
Route::get('/admin/manage_portal', [App\Http\Controllers\Admin::class, 'manage_portal']);   
Route::post('/admin/add_new_portal', [App\Http\Controllers\Admin::class, 'add_new_portal']); 
Route::get('/admin/portal_status/{id}', [App\Http\Controllers\Admin::class, 'portal_status']);


/*Portal Controller */
Route::get('/portal/signup', [App\Http\Controllers\PortalController::class, 'portal_signup']);
Route::post('/portal/signup_sub', [App\Http\Controllers\PortalController::class, 'signup_sub']);   
Route::post('/portal/login_sub', [App\Http\Controllers\PortalController::class, 'login_sub']);
Route::get('/portal/login', [App\Http\Controllers\PortalController::class, 'login']);

/*PortalOOperation Controller */
Route::get('/portal/dashboard', [App\Http\Controllers\PortalOOperation::class, 'dashboard']);
Route::get('/portal/exam_from/{id}', [App\Http\Controllers\PortalOOperation::class, 'exam_from']);
Route::post('/portal/exam_form_submit', [App\Http\Controllers\PortalOOperation::class, 'exam_form_submit']);
Route::get('/portal/print/{id}', [App\Http\Controllers\PortalOOperation::class, 'print']);  
Route::get('/portal/update_form', [App\Http\Controllers\PortalOOperation::class, 'update_form']);  
Route::get('/portal/student_exam_info', [App\Http\Controllers\PortalOOperation::class, 'student_exam_info']);    
Route::post('/portal/student_exam_info_edit', [App\Http\Controllers\PortalOOperation::class, 'student_exam_info_edit']); 
Route::get('/portal/logout', [App\Http\Controllers\PortalOOperation::class, 'logout']); 
Route::get('portal/pdf/{id}', [App\Http\Controllers\PortalOOperation::class, 'create']); 


/*Student Controller */
Route::get('/student/signup', [App\Http\Controllers\PortalOOperation::class, 'signup']);


Route::get('pdf/preview', [App\Http\Controllers\PdfController::class, 'index']);
Route::get('pdf/generate', [App\Http\Controllers\PdfController::class, 'create']);  


