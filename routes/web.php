<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
<<<<<<< HEAD
use App\Models\Product;
=======
>>>>>>> a1abc01a3ffbcf219dbb8e9cd7f1c096d4ffbd00

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

Route::get(
    '/{type}/{id}',
    [MailController::class, 'index']
);
Route::post('/send-email', [MailController::class, 'send'])->name('send-email');
Route::post('/tweet', [MailController::class, 'tweet'])->name('tweet');

<<<<<<< HEAD
Route::get('/dashboard', function () {
    $product = Product::get();
    return view('dashboard', ['products' => $product]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
=======
Route::get('/dashboard/product/{id}' , [ProductController::class, 'product'])->name('product');
>>>>>>> a1abc01a3ffbcf219dbb8e9cd7f1c096d4ffbd00
