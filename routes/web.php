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



