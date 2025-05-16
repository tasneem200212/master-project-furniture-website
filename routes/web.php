<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WhishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\categoryAdminController;
use App\Http\Controllers\Admin\ReviewsAdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\InventoryController;
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

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Product management
    Route::resource('products', ProductAdminController::class);
    Route::resource('categories', CategoryAdminController::class);
    Route::resource('reviews', ReviewsAdminController::class);
    
    // Orders Management
    Route::resource('orders', OrderController::class);
    
    // Customers Management
    Route::resource('users', UserAdminController::class);
    
    // Admin Profile
    Route::get('profile', [AdminProfileController::class, 'show'])->name('profile');
    Route::put('profile/{id}', [AdminProfileController::class, 'update'])->name('profile.update');
    
    // Other admin routes
    Route::resource('cupon', CuponController::class);
    Route::resource('payment_methods', PaymentMethodController::class);
    Route::resource('inventory', InventoryController::class);
});

// // Admin Routes
// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
//     // Dashboard
//     Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    
//     // Content Management
//     Route::prefix('content')->name('content.')->group(function () {
//         Route::resource('products', ProductAdminController::class);
//         Route::resource('categories', CategoryAdminController::class);
//         Route::resource('reviews', ReviewsAdminController::class);
//     });
    
//     // Sales Management
//     Route::prefix('sales')->name('sales.')->group(function () {
//         Route::resource('orders', OrderController::class);
//         Route::resource('coupons', CuponController::class)->except(['show']);
//         Route::resource('payment-methods', PaymentMethodController::class);
//     });
    
//     // User Management
//     Route::prefix('users')->name('users.')->group(function () {
//         Route::resource('customers', UserAdminController::class);
//         Route::get('profile', [AdminProfileController::class, 'show'])->name('profile.show');
//         Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
//     });
    
//     // Inventory Management
//     Route::resource('inventory', InventoryController::class)->only(['index', 'edit', 'update']);
// });








Route::resource('Pro', ProductController::class);



Route::get('product', [ProductController::class, 'showProducts'])->name('product.show');

Route::middleware(['auth'])->group(function () {
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('reviews/{product}', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('order/{orderId}', [UserProfileController::class, 'showOrder'])->name('orders.show');
    Route::delete('/order/{id}/cancel', [UserProfileController::class, 'cancelOrder'])->name('order.cancel');
    Route::post('/update-shipping', [CheckoutController::class, 'updateShipping'])->name('checkout.updateShipping');



    Route::group(['middleware' => ['auth', 'user']], function() {
        // User Profile Routes
        Route::get('user/profile', [UserProfileController::class, 'show'])->name('user.profile');
        Route::put('user/profile/{id}', [UserProfileController::class, 'update'])->name('user.profile.update');
    });
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



});




Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/product-details/{id}', [ProductController::class, 'viewProduct'])->name('product-details');
Route::get('/product/quick-view/{id}', [ProductController::class, 'quickViewAjax']);


Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');



Route::get('pro', [ProductController::class, 'viewProductrating'])->name('product-rating');



Route::resource('cart', CartController::class);



Route::get('/wishlist', [WhishlistController::class, 'show'])->name('wishlist');

Route::post('/wishlist/add', [WhishlistController::class, 'store'])->name('wishlist.store');
Route::post('/wishlist/addtoCart', [WhishlistController::class, 'addtoCart'])->name('wishlist.addtoCart');
Route::get('/wishlist/remove/{id}', [WhishlistController::class, 'destroy'])->name('wishlist.destroy');

Route::resource('checkout', CheckoutController::class);
Route::get('payment/paypal/{order_id}', [PaymentController::class, 'paypal'])->name('payment.paypal');
Route::get('payment/bank/{order_id}', [PaymentController::class, 'bank'])->name('payment.bank');

Route::get('/store', function () {
    return view('store');
})->name('store');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/portfolio-details', function () {
    return view('portfolio-details');
})->name('portfolio-details');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// Authentication routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

