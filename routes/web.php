<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomebannerController;
use App\Http\Controllers\Admin\InqueryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\VendorController as WebVendorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Web\AccountController;
use App\Http\Controllers\Web\BookingStripeController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\ShopController;
use App\Http\Controllers\Web\StoreController;
use App\Http\Controllers\Web\WishlistController;

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');

    return "<h4 style='color:green;'>✅ All caches cleared!</h4>
            <a href='javascript:history.back()'>
                <i class='fa fa-angle-left'></i> Go Back
            </a>";
});
// Auth Routes
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/vendor-register', [RegisterController::class, 'showRegisterVendorForm'])->name('registerVendor');
Route::post('/vendor-register', [RegisterController::class, 'registerVendor']);
Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');
// End Auth Routes
// Website Routes
Route::get( '/', [HomeController::class, 'index'])->name('home.index');
Route::post('/get-nearest-vendors', [HomeController::class, 'nearest'])->name('vendors.nearest');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-post', [ContactController::class, 'store'])->name('contact.store');
Route::get('/stores', [WebVendorController::class, 'index'])->name('stores.index');
Route::get('/about-us', [AboutController::class, 'index'])->name('about.index');
Route::get('/privacy-policy', [AboutController::class, 'privacy'])->name('privacy.policy');
Route::get('/terms-condition', [AboutController::class, 'terms'])->name('terms.condition');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/category/{slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/product-details/{slug}', [ShopController::class, 'productDetails'])->name('product.show');
Route::post('/submit-review', [ShopController::class, 'store'])->name('review.submit');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::get('/appointment/{id}', [ShopController::class, 'appointment'])->name('appointment');
Route::post('/booking-stripe/checkout', [BookingStripeController::class, 'checkout'])->name('stripe.BookingStripeCheckout');
Route::get('/booking-stripe/success', [BookingStripeController::class, 'success'])->name('stripeBooking.success');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'stripeSuccess'])->name('stripe.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'stripeCancel'])->name('stripe.cancel');

Route::get('/store/{id}',[WebVendorController::class,'show'])->name('vendor.show');
Route::post('/review-vendor', [WebVendorController::class, 'postVendorReview'])->name('vendor.postReview');

// End Website Routes
// Accoutn Area
Route::controller(AccountController::class)->group(function () {
    Route::get('account/orders', 'orders')->name('account.orders');
    Route::get('account/bookings', 'bookings')->name('account.bookings');
    Route::get('account/order/{order}', 'Itemsshow')->name('order.show');
    Route::get('account/profile', 'profile')->name('account.profile');
    Route::get('account/edit-profile', 'editprofile')->name('account.editprofile');
    Route::put('account/profile', 'updateprofile')->name('account.updateprofile');
    Route::get('account/reset-password', 'resetpassword')->name('account.resetpassword');
    Route::put('account/reset-password', 'updatepassword')->name('account.updatepassword');
    Route::get('account/wishlist', 'wishlist')->name('account.wishlist');
    Route::delete('account/wishlist/{id}', 'removewishlist')->name('account.removewishlist');
    Route::get('account/orderitems/{id}', 'orderitems')->name('account.orderitems');
});

// End Accoutn Area
// Admin Or Vendor Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::group(['middleware' => ['admin.guest']], function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    });
    Route::group(['middleware' => ['admin.auth']], function () {
        Route::get('permission-denied', [DashboardController::class, 'PermissionDenied'])->name('permission-denied');
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [DashboardController::class, 'destroy'])->name('logout');
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
        Route::put('profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
        Route::put('password/update', [DashboardController::class, 'updatePassword'])->name('password.update');
        Route::resource('homebanners', HomebannerController::class)->middleware('permission:banner-management');
        Route::resource('roles', RoleController::class)->middleware('permission:roles-management');
        Route::resource('permissions', PermissionController::class)->middleware('permission:permission-management');
        Route::resource('users', UserController::class)->middleware('permission:user-management');
        Route::resource('products', ProductController::class)->middleware('permission:product-management');
        Route::resource('services', ServiceController::class)->middleware('permission:services-managment');
        Route::delete('remove-image', [ProductController::class, 'removeImage'])->name('remove.image');
        Route::get('requested-vendors', [VendorController::class, 'requestedVendors'])->name('requestedVendors')->middleware('permission:requested-vendor');
        Route::get('requested-vendors/{id}', [VendorController::class, 'show'])->name('vendors.show');
        Route::post('vendors/change-status/{id}', [VendorController::class, 'changeStatus'])->name('vendors.changeStatus');
        Route::get('blocked-vendors', [VendorController::class, 'BlockedVendors'])->name('BlockedVendors')->middleware('permission:blocked-vendors');
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index')->middleware('permission:order-managment');
        Route::get('orders-details/{orderId}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index')->middleware('permission:booking-management');
        Route::get('bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
        Route::put('bookings/{id}/update-status', [BookingController::class, 'updateStatus'])->name('bookings.update-status');
        Route::put('order/{id}/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
        Route::get('vendor-reviews', [VendorController::class, 'index'])->name('vendor-reviews.index')->middleware('permission:vendor-reviews');
        Route::post('/mark-contacts-read', [DashboardController::class, 'markAllRead'])->name('contacts.markAllRead')->middleware('permission:inquiries-management');
        Route::resource('inquiries', InqueryController::class)->middleware('permission:inquiries-management');
        Route::resource('contents', ContentController::class)->middleware('permission:content-management');
        Route::resource('generals', GeneralController::class)->middleware('permission:general-management');
        Route::get('payments',[DashboardController::class,'payments'])->name('payments')->middleware('permission:payment-management');
        Route::post('payments/{payment}/mark-paid', [DashboardController::class, 'markAsPaid'])->name('payments.markPaid');
    });
});
