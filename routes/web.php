<?php

use App\Models\product;
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

// Route::get('/', function () {
//         return view('admin.share.master');
//     });

Route::group(['prefix' => '/admin' , 'middleware' => 'checkAdmin'], function(){
    // Route::group(['prefix' => '/admin' , 'middleware' => 'checkAminLogin'], function(){
    // });

    Route::get('/categories/create', [\App\Http\Controllers\CategoriesController::class, 'create']);
    Route::post('/categories/create', [\App\Http\Controllers\CategoriesController::class, 'store']);
    Route::get('/categories/index', [\App\Http\Controllers\CategoriesController::class, 'index']);
    Route::get('/categories/update-is-view/{id}', [\App\Http\Controllers\CategoriesController::class, 'updateIsView']);
    Route::get('/categories/delete_only/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroyOnly']);
    Route::get('/categories/delete_all/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroyAll']);
    Route::get('/categories/edit/{id}', [\App\Http\Controllers\CategoriesController::class, 'edit']);
    Route::post('/categories/update/{id}', [\App\Http\Controllers\CategoriesController::class, 'update']);

    Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create']);
    Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('create.Product');
    Route::get('/products/index', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/products/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
    Route::get('/products/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('/products/changeView', [\App\Http\Controllers\ProductController::class, 'changeValueView'])->name('change.View');
    Route::post('/products/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);


    Route::get('/brand/create', [\App\Http\Controllers\BrandController::class, 'create']);
    Route::get('/brand/index', [\App\Http\Controllers\BrandController::class, 'index']);
    Route::post('/brand/create', [\App\Http\Controllers\BrandController::class, 'store']);
    Route::get('/brand/update-is-view/{id}', [\App\Http\Controllers\BrandController::class, 'updateIsView']);
    Route::get('/brand/delete_all/{id}', [\App\Http\Controllers\BrandController::class, 'destroyAll']);
    Route::get('/brand/edit/{id}', [\App\Http\Controllers\BrandController::class, 'edit']);
    Route::post('/brand/update/{id}', [\App\Http\Controllers\BrandController::class, 'update']);

    Route::get('/banner/create', [\App\Http\Controllers\BannerController::class, 'create']);
    Route::get('/banner/index', [\App\Http\Controllers\BannerController::class, 'index']);
    Route::post('/banner/createMain', [\App\Http\Controllers\BannerController::class, 'storeMain']);
    Route::post('/banner/createSub', [\App\Http\Controllers\BannerController::class, 'storeSub']);
    Route::post('/banner/update-is-viewMain', [\App\Http\Controllers\BannerController::class, 'updateIsViewMain'])->name('change.Main');
    Route::post('/banner/update-is-viewSub1', [\App\Http\Controllers\BannerController::class, 'updateIsViewSub1'])->name('change.Sub1');
    Route::post('/banner/update-is-viewSub2', [\App\Http\Controllers\BannerController::class, 'updateIsViewSub2'])->name('change.Sub2');
    Route::post('/banner/update-is-viewSub3', [\App\Http\Controllers\BannerController::class, 'updateIsViewSub3'])->name('change.Sub3');
    Route::get('/banner/deleteMain/{id}', [\App\Http\Controllers\BannerController::class, 'destroyMain']);
    Route::get('/banner/editMain/{id}', [\App\Http\Controllers\BannerController::class, 'editMain']);
    Route::post('/banner/updateMain/{id}', [\App\Http\Controllers\BannerController::class, 'updateMain']);

});

Route::group(['prefix' => '/admin' , 'middleware' => 'checkAdminLogin'], function(){
    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'Logout']);

});

    Route::get('/admin/register', [\App\Http\Controllers\AdminController::class, 'viewRegister']);
    Route::post('/admin/register', [\App\Http\Controllers\AdminController::class, 'register'])->name('adminRegister');
    Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'viewLogin']);
    Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'Login'])->name('Login');

    Route::get('/admin/forgot-password', [\App\Http\Controllers\AdminController::class, 'viewForget']);




    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/errors', [\App\Http\Controllers\HomeController::class, 'errors']);
    Route::get('/detail', [\App\Http\Controllers\HomeController::class, 'detail']);
    Route::get('/profile', [\App\Http\Controllers\HomeController::class, 'profile']);












