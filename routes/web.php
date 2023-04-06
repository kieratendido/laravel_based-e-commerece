<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    
    })->name('dashboard');
    
Route::group(['middleware' => ['auth', 'verified']], function () {  
    Route::get('/redirect', [HomeController::class, 'index']);    

    Route::get('/adminCategory', [AdminController::class, 'view_category'])->name('viewCategory');
    Route::post('/addCategory', [AdminController::class, 'add_category'])->name('addCategory');

    Route::get('/deleteCategory/{id}', [AdminController::class, 'delete_category'])->name('deleteCategory');
    Route::get('/viewProducts', [AdminController::class, 'view_product'])->name('viewProducts');
    Route::post('/addProduct', [AdminController::class, 'add_product'])->name('addProduct');
    Route::get('/showProducts', [AdminController::class, 'show_product'])->name('showProducts');
    Route::get('/deleteProduct/{id}', [AdminController::class, 'delete_product'])->name('deleteProduct');
    Route::get('/editProduct/{id}', [AdminController::class, 'edit_product'])->name('editProduct');
    Route::post('/updateProductConfirm/{id}', [AdminController::class, 'update_product_confirm'])->name('updateProductConfirm');

    Route::post('/addCart/{id}', [HomeController::class, 'add_cart'])->name('addCart');

    Route::get('/productDetails/{id}', [HomeController::class, 'product_details'])->name('productDetails');
    Route::get('/productHeader', [HomeController::class, 'product_header'])->name('productHeader');


});


