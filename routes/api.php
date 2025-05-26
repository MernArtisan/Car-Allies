<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// AUTHORIZATION ROUTES

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/terms-of-use', [AuthController::class, 'termsOfUse']);
// Route::get('/send-notification/{userId}', [AuthController::class, 'sendNotificationToUser']);

Route::middleware(['auth:sanctum'])->group(function () {
    // LOGOUT ALL VENDOR OR USERS
    Route::post('/logout', [AuthController::class, 'logout']);
    // USER ROUTES HERE
    // --------------------------------------------------------------------------------------------------------------------
    // USERS ALL ACTIVITY LEVEL ROUTES HERE

    Route::post('/vendor-apply', [AuthController::class, 'vendorApply']);

    Route::get('get-categories', [HomeController::class, 'getCategories']);

    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
    Route::get('/terms-conditions', [HomeController::class, 'termsConditions']);
    Route::post('/change-password', [HomeController::class, 'changePassword']);
    Route::post('/update-fcm-token', [HomeController::class, 'updateFcmToken']);
    Route::get('/notification-get', [HomeController::class, 'getNotification']);
    Route::post('/seen-notifications', [HomeController::class, 'seenNotification']);
    Route::post('/profile-update', [HomeController::class, 'AuthUpdateProfile']);
    // name description image establish_since 
    Route::get('/homebannerAndNearestVendors', [HomeController::class, 'homebannerAndNearestVendors']);
    Route::get('all-vendors', [HomeController::class, 'allVendors']);
    Route::get('all-services', [HomeController::class, 'allServices']);
    Route::get('/vendor/{id}', [HomeController::class, 'vendor']);
    Route::get('/top-rated-products', [HomeController::class, 'topRatedProducts']);
    Route::get('/all-products', [HomeController::class, 'allProducts']);
    Route::get('/product-details/{id}', [HomeController::class, 'productDetails']);
    Route::post('/cart-add', [HomeController::class, 'addToCart']);
    Route::get('/cart', [HomeController::class, 'getCart']);
    Route::delete('/cart-delete/{cartItemId}', [HomeController::class, 'deleteCartItem']);
    Route::patch('/cart-update-quantity/{cartItemId}', [HomeController::class, 'updateCartQuantity']);
    Route::post('/orders-place', [HomeController::class, 'placeOrder']);
    Route::get('/manage-orders', [HomeController::class, 'ManageOrders']);
    Route::get('/order-details/{id}', [HomeController::class, 'orderDetails']);
    Route::put('/order-status/{id}', [HomeController::class, 'updateOrderStatus']);
    Route::post('/orders-dispute/{orderId}', [HomeController::class, 'fileDispute']);
    Route::get('/search-bar', [HomeController::class, 'searchBar']);
    Route::get('/filter', [HomeController::class, 'filter']);
    Route::post('/review-product/{id}', [HomeController::class, 'postProductReview']);
    Route::get('/get-product-review/{productId}', [HomeController::class, 'getProductReview']);
    Route::post('/review-vendor/{id}', [HomeController::class, 'postVendorReview']);
    Route::get('/get-vendor-review/{vendorId}', [HomeController::class, 'getVendorReview']);
    Route::get('/get-available-slots/{vendorId}', [HomeController::class, 'getAvailableSlots']);
    Route::post('/book-slot', [HomeController::class, 'BookSlot']);

    // -------------------------------------------------------------------------------------------
    // VENDOR ROUTES HERE
    Route::post('/post-availability', [VendorController::class, 'postAvailability']);
    // VENDOR SERVICES MODULE
    Route::get('/services', [VendorController::class, 'services']);
    Route::post('/services-store', [VendorController::class, 'servicesStore']);
    Route::post('/services-edit/{id}', [VendorController::class, 'servicesEdit']);
    Route::get('/services-show/{id}', [VendorController::class, 'servicesShow']);
    
    Route::delete('/services-delete/{id}', [VendorController::class, 'servicesDelete']);
    // VENDOR PRODUCTS MODULE
    Route::get('/products', [VendorController::class, 'products']);
    Route::post('/products-store', [VendorController::class, 'productsStore']);
    Route::post('/products-edit/{id}', [VendorController::class, 'productsEdit']);
    Route::delete('/products-delete/{id}', [VendorController::class, 'productsDelete']);
    Route::put('/bookings-complete/{id}', [VendorController::class, 'markAsCompleted']);
    Route::post('/contact', [HomeController::class, 'contact']);
    Route::get('vendor-payments', [HomeController::class, 'Payments']);
});
