<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Route::get('/', function () {
//     return view('pageutama');
// });

Route::get('/dashboard', function () {
    return view('pageadmin.dashboard');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('regisrerr');
// });

Route::get('/cart', [CartController::class, 'show']);
Route::get('/cart/delete/{id}', [CartController::class, 'delete']);

Route::get('/regist', [UserController::class, 'show']);
Route::post('/regist/create', [UserController::class, 'create']);
Route::post('/auth', [UserController::class, 'auth']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/checkout', [CartDetailController::class, 'show']);
Route::get('/transaksi', [CartDetailController::class, 'showpesanan']);
Route::post('/checkout/create/{id}/{total}', [CartDetailController::class, 'create']);

Route::get('/page', [PageController::class, 'show']);
Route::get('/detail/{id}', [PageController::class, 'showid']);
Route::post('/detail/create/{kode}', [PageController::class, 'create']);

Route::get('/sepatu', [PageController::class, 'showsepatu']);
Route::get('/baju', [PageController::class, 'showbaju']);
Route::get('/tas', [PageController::class, 'showtas']);

Route::get('/produk', [ProdukController::class, 'show']);
Route::post('/produk/create', [ProdukController::class, 'create']);
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::get('/produk/delete/{id}', [ProdukController::class, 'delete']);

Route::get('/pengguna', [UserController::class, 'showuser']);
Route::get('/myuser', [UserController::class, 'showauth']);
Route::post('/user/update/{id}', [UserController::class, 'userupdate']);

