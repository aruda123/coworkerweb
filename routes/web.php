<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [MainController::class, 'index']);

Route::get('about', [MainController::class, 'about']);

Route::get('portfolio', [MainController::class, 'portfolio']);
Route::get('portfolio/{id}', [MainController::class, 'portfolioShow']);

Route::get('service', [MainController::class, 'service']);
Route::get('service2', [MainController::class, 'service2']);
Route::get('service3', [MainController::class, 'service3']);


Route::get('contact', [MainController::class, 'contact']);
Route::post('contact', [MainController::class, 'contactStore']);
Route::post('contact-menu', [MainController::class, 'contactMenuStore']);
Route::get('contact-check', [MainController::class, 'contact_check']);

Route::get('fileDownload/{fn}/{fn_ori}', [MainController::class, 'fileDownload']);


Route::prefix('adm')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::post('auth', [AdminController::class, 'auth']);
    Route::get('logout', [AdminController::class, 'logout']);
    Route::get('/fileDownload/{fn}/{fn_ori}', [AdminController::class, 'fileDownload']);

    Route::prefix('contact')->group(function(){
        Route::get('/', [AdminController::class, 'contact']);
        Route::get('/{id}', [AdminController::class, 'contactShow']);
        Route::DELETE('/contactDestory', [AdminController::class, 'contactDestory']);
    });

    Route::prefix('inquiry')->group(function(){
        Route::get('/', [AdminController::class, 'inquiry']);
        Route::get('/{id}', [AdminController::class, 'inquiryShow']);
        Route::DELETE('/inquiryDestory', [AdminController::class, 'inquiryDestory']);
    });

    Route::prefix('portfolio')->group(function(){
        Route::get('/', [AdminController::class, 'portfolio']);
        Route::get('/portfolioCreate', [AdminController::class, 'portfolioCreate']);
        Route::post('/', [AdminController::class, 'portfolioStore']);
        Route::get('/{id}', [AdminController::class, 'portfolioShow']);
        Route::DELETE('/portfolioDestory', [AdminController::class, 'portfolioDestory']);
        Route::post('/portfolioUpdate/{id}', [AdminController::class, 'portfolioUpdate']);
    });

    Route::prefix('download')->group(function(){
        Route::get('/', [AdminController::class, 'download']);
        Route::post('/', [AdminController::class, 'downloadStore']);
        Route::DELETE('/', [AdminController::class, 'downloadDestory']);
    });
});
