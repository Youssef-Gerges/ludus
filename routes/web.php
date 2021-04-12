<?php

use App\Http\Controllers\baseController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\reviewsController;
use App\Http\Controllers\socaliteController;
use App\Http\Controllers\userAdmin\addressController;
use App\Http\Controllers\userAdmin\orderController;
use App\Http\Controllers\userAdmin\userDashboardController;
use App\Http\Controllers\wishController;
use Illuminate\Support\Facades\Route;


Route::get('/auth/google',  [socaliteController::class, 'loginview'])->name('googleLogin');
Route::get('auth/google/callback', [socaliteController::class, 'loginWithGoogle']);

//static routes
Route::get('/{page}', baseController::class)
    ->where(['page' => 'contact|faq|about'])
    ->name('static');

//home page
Route::get('/', [baseController::class, 'index'])->name('home');

// main shop page
Route::get('/shop', [baseController::class, 'shop'])->name('shop');

//get single product
Route::get('/product/{product}', [baseController::class, 'singleProduct'])
->where(['product' => '[0-9]+'])
->name('singleProduct');

//add review
Route::post('review/add/', [reviewsController::class, 'add'])->name('addReview')->middleware('verified');

//shopping Cart
Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('/', [cartController::class, 'index'])->name('view');
    Route::post('/add', [cartController::class, 'addToCart'])->name('add');
    Route::put('/edit', [cartController::class, 'editCart'])->name('edit');
    Route::delete('/remove', [cartController::class, 'removeFromCart'])->name('remove');
    Route::get('/destroy', [cartController::class, 'destroyCart'])->name('destroy');
});

//wishlist
Route::group(['prefix' => 'wishlist', 'as' => 'wish.', 'middleware' => 'verified'], function () {
    Route::get('/', [wishController::class, 'index'])->name('view');
    Route::post('/add', [wishController::class, 'addToWish'])->name('add');
    Route::delete('/remove', [wishController::class, 'removeFromWish'])->name('remove');
    Route::get('/destroy', [wishController::class, 'destroyWish'])->name('destroy');
});


//user Dashboard
Route::group(['prefix'=> 'dashboard', 'middleware'=> 'verified', 'as' => 'userdashboard.'], function () {
    //home page
    Route::get('/', [userDashboardController::class, 'index'])->name('home');

    //edit user info
    Route::get('/myaccount', [userDashboardController::class, 'viewAccount'])->name('myaccount');
    Route::get('/edit-myaccount', [userDashboardController::class, 'editAccountView'])->name('edit-myaccount');
    Route::post('/edit-myaccount', [userDashboardController::class, 'editAccount'])->name('save-myaccount');

    //edit address
    Route::get('/address-book', [addressController::class, 'addressBook'])->name('address-book');
    Route::get('/make-default-address', [addressController::class, 'makeDefaultAddressView'])->name('make-default-address');
    Route::post('/make-default-address', [addressController::class, 'makeDefaultAddress'])->name('save-default-address');
    Route::get('/add-address', [addressController::class, 'addAddressView'])->name('add-address');
    Route::post('/add-address', [addressController::class, 'addAddress'])->name('save-address');

    //orders
    Route::get('/orders' , [orderController::class, 'orders'])->name('orders');
    Route::get('/orders/{invoice}' , [orderController::class, 'manageInvoice'])->name('manageInvoice');
});
