<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserCartController;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image as Image;

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
Auth::routes(['verify'=>true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 *  Email verification & password reset
 */
Route::get('/email/verify', function () {
   if(!Auth::user()->email_verified_at){
     return view('auth.verify');
   }else{
     return redirect()->route('home');
   }
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    if(!Auth::user()->email_verified_at){
     $request->fulfill();
     return redirect('/');
    } else {
     return redirect()->route('home');
    }
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
     if(!Auth::user()->email_verified_at){
     $request->user()->sendEmailVerificationNotification();
     return back()->with('message', 'Verification link sent!');
     } else {
     return redirect()->route('home');
     }
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/**
 * Password forget
 */
Route::get('/forgot-password', [ForgotPasswordController::class,'showLinkRequestForm'])->middleware('guest')->name('password.request');
Route::post('/forgot-password',[ForgotPasswordController::class,'sendResetLinkEmail'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}',[ForgotPasswordController::class,'sendPasswordToken'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class,'resetPassword'])->middleware('guest')->name('password.update');

/**
 * Routes accessible only to verified users
 */
Route::group(['middleware' => 'verified'],function(){

    // User account
    Route::get('/profile/settings', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/cartpayment',[ProfileController::class, 'index'])->name('user_payment');
    Route::get('/profile/addcart',[ProfileController::class, 'index'])->name('cards');
    Route::post('/addcart',[ProfileController::class, 'addPaymentCart'])->name('add_card');
    Route::get('/profile/myorder',[ProfileController::class, 'index'])->name('order');
    Route::get('/profile/update',[ProfileController::class, 'index'])->name('account.update');
    Route::patch('/profile/update/store',[ProfileController::class, 'updateData'])->name('account.update.data');
    Route::patch('/profile/update/store-password',[ProfileController::class, 'updatePassword'])->name('account.update.password');
    Route::patch('/profile/update/store-image',[ProfileController::class, 'imageUpload'])->name('account.update.image');

    //Favourites products
    Route::get('/favourites',[ProfileController::class,'showFavoritesProd'])->name('show.fav');
    Route::post('/favourites/{id}-store',[ProfileController::class,'storeFavoritesProd'])->name('store.fav');
    Route::post('/favourites/{id}-delete',[ProfileController::class,'deleteItem'])->name('delete.fav');
    Route::post('/favourites/clear',[ProfileController::class,'clearList'])->name('clear.fav');
    Route::post('/favourites',[ProfileController::class,'addItemToCart'])->name('add.cart.fav');

    //Reviews
    Route::post('/reviews-store',[ReviewController::class,'store'])->name('store.review');

    // Stripe
    Route::get('stripe/{total}', [StripeController::class, 'stripe'])->name('stripe_payment');
    Route::post('stripe/{total}', [StripeController::class, 'stripePost'])->name('stripe.post');
    Route::get('savecard',[StripeController::class, 'verifyCard']);
    Route::get('success-payment', function(){
        return view('layouts.success-payment');
    })->name('success-payment');

    //User cart
    Route::get("cart",[UserCartController::class,'index'])->name('cart');
    Route::post("cart/store-{name}",[UserCartController::class,'store'])->name('store_product');
    Route::post("cart/delete-{id}",[UserCartController::class,'delete'])->name('delete_product');
    Route::post("cart/clear",[UserCartController::class,'clearCart'])->name('clear');
});

/**
 * Admin panel
 */
Route::group(['middleware'=>['admin','auth']],function(){
    Route::get('/admin/panel', [AdminController::class,'index'])->name('admin.panel');
    Route::get('/admin/panel/add-product',[ProductsController::class,'addProduct'])->name('add_products');
    Route::post('/admin/panel/add-product/store',[ProductsController::class,'store'])->name('store-product');
    Route::get('/admin/panel/update-product/{id}',[ProductsController::class,'updateProduct'])->name('update.product');
    Route::patch('/admin/panel/update-product/{id}',[ProductsController::class,'update'])->name('edit.product');
    Route::post('/admin/panel/delete/{id}',[ProductsController::class,'delete'])->name('delete.product');

    //Subscribes
    Route::get('/admin/panel/subscribes',[AdminController::class,'Subscribes'])->name('subscribes');

    //Orders
    Route::get('/admin/panel/orders',[AdminController::class,'Orders'])->name('orders');

    // Images handling
    Route::post('/delete-image/{id}',[ProductsController::class,'deleteImage'])->name('delete.image');
    Route::post('/clear-images/{id}',[ProductsController::class,'deleteImage'])->name('clear.images');
});

// show products
Route::get("/product/{name}", [ProductsController::class,'show'])->name('product.show');
Route::get("/category/{name}", [ProductsController::class,'showCategories'])->name('categories');

//Search bar
Route::get("/search",[SearchController::class,'search'])->name('search');
