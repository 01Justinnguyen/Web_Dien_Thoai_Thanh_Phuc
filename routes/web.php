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
    return view('admin.share.master');
});
Route::get('/admin/categories/create', [\App\Http\Controllers\CategoriesController::class, 'create']);
Route::post('/admin/categories/create', [\App\Http\Controllers\CategoriesController::class, 'store']);
Route::get('/admin/categories/index', [\App\Http\Controllers\CategoriesController::class, 'index']);
Route::get('/admin/categories/update-is-view/{id}', [\App\Http\Controllers\CategoriesController::class, 'updateIsView']);
Route::get('/admin/categories/delete_only/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroyOnly']);
Route::get('/admin/categories/delete_all/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroyAll']);
Route::get('/admin/categories/edit/{id}', [\App\Http\Controllers\CategoriesController::class, 'edit']);
Route::post('/admin/categories/update/{id}', [\App\Http\Controllers\CategoriesController::class, 'update']);
Route::get('/admin/products/create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/admin/products/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('create.Product');
Route::get('/admin/products/index', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/admin/products/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/admin/products/edit/{id}', [\App\Http\Controllers\CategoriesController::class, 'edit']);
Route::post('/admin/products/changeView', [\App\Http\Controllers\ProductController::class, 'changeValueView'])->name('change.View');

Route::get('/admin/register', [\App\Http\Controllers\AdminController::class, 'viewRegister']);
Route::post('/admin/register', [\App\Http\Controllers\AdminController::class, 'register'])->name('adminRegister');
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'viewLogin']);










