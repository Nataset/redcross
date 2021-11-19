<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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
    return view('auth.login');
});

Route::post('/send-email', [MailController::class, 'send'])->name('send-email');
Route::post('/tweet', [MailController::class, 'tweet'])->name('tweet');

Route::get('/dashboard/product/{id}', [ProductController::class, 'product'])->name('product');
Route::get('/edit/product/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
Route::put('/edit/product/{id}', [ProductController::class, 'confirmEditProduct'])->name('confirmEditProduct');
// Route::get('/add/product/{id}', [ProductControoler::class, 'addProduct'])
Route::get('/add/product', [ProductController::class, 'add'])->name('add');
Route::post('/add/product', [ProductController::class, 'store'])->name("storeProduct");
Route::get('/dashboard', function () {
    $product = Product::get();
    return view('dashboard', ['products' => $product]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get(
    '/{type}/{id}',
    [MailController::class, 'index']
);
