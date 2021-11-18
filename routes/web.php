<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;

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

Route::get(
    '/{type}/{id}',
    [MailController::class, 'index']
);
Route::post('/send-email', [MailController::class, 'send'])->name('send-email');
Route::post('/tweet', [MailController::class, 'tweet'])->name('tweet');

Route::get('/dashboard/product/{id}' , [ProductController::class, 'product'])->name('product');
