<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FlashSaleController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CompareController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupportMessageController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Aboutus Routes
Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us.index');

//wishlist Routes
Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

//Compare Routes
Route::get('compare', [CompareController::class, 'index'])->name('compare.index');

//Cart Routes
Route::get('cart', [CartController::class, 'index'])->name('cart.index');

//Checkout Routes
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');

//For Login
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'registerStore'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login.check');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //For Category
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update', [CategoryController::class, 'update'])->name('update');

        Route::get('status/{id}', [CategoryController::class, 'status'])->name('status');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('/category-data', [CategoryController::class, 'getData'])->name('data');
    });

    //For Brand
    Route::prefix('brand')->name('brand.')->group(function () {
        Route::get('', [BrandController::class, 'index'])->name('index');
        Route::get('create', [BrandController::class, 'create'])->name('create');
        Route::post('store', [BrandController::class, 'store'])->name('store');

        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::post('update', [BrandController::class, 'update'])->name('update');

        Route::get('status/{id}', [BrandController::class, 'status'])->name('status');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('delete');
        Route::get('/brand-data', [BrandController::class, 'getData'])->name('data');
    });

    // For SubCategoty
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('', [SubCategoryController::class, 'index'])->name('index');
        Route::get('create', [SubcategoryController::class, 'create'])->name('create');
        Route::post('store', [SubcategoryController::class, 'store'])->name('store');

        Route::get('edit/{id}', [SubcategoryController::class, 'edit'])->name('edit');
        Route::post('update', [SubcategoryController::class, 'update'])->name('update');

        Route::get('status/{id}', [SubcategoryController::class, 'status'])->name('status');
        Route::get('delete/{id}', [SubcategoryController::class, 'delete'])->name('delete');
        Route::get('/brand-data', [SubcategoryController::class, 'getData'])->name('data');
    });

    //For Color
    Route::prefix('color')->name('color.')->group(function () {
        Route::get('', [ColorController::class, 'index'])->name('index');
        Route::get('create', [ColorController::class, 'create'])->name('create');
        Route::post('store', [ColorController::class, 'store'])->name('store');

        Route::get('edit/{id}', [ColorController::class, 'edit'])->name('edit');
        Route::post('update', [ColorController::class, 'update'])->name('update');

        Route::get('status/{id}', [ColorController::class, 'status'])->name('status');
        Route::get('delete/{id}', [ColorController::class, 'delete'])->name('delete');
        Route::get('/brand-data', [ColorController::class, 'getData'])->name('data');
    });

    //For Unit
    Route::prefix('unit')->name('unit.')->group(function () {
        Route::get('', [UnitController::class, 'index'])->name('index');
        Route::get('create', [UnitController::class, 'create'])->name('create');
        Route::post('store', [UnitController::class, 'store'])->name('store');

        Route::get('edit/{id}', [UnitController::class, 'edit'])->name('edit');
        Route::post('update', [UnitController::class, 'update'])->name('update');

        Route::get('status/{id}', [UnitController::class, 'status'])->name('status');
        Route::get('delete/{id}', [UnitController::class, 'delete'])->name('delete');
        Route::get('/brand-data', [UnitController::class, 'getData'])->name('data');
    });

    //For Size
    Route::prefix('size')->name('size.')->group(function () {
        Route::get('', [SizeController::class, 'index'])->name('index');
        Route::get('create', [SizeController::class, 'create'])->name('create');
        Route::post('store', [SizeController::class, 'store'])->name('store');

        Route::get('edit/{id}', [SizeController::class, 'edit'])->name('edit');
        Route::post('update', [SizeController::class, 'update'])->name('update');

        Route::get('status/{id}', [SizeController::class, 'status'])->name('status');
        Route::get('delete/{id}', [SizeController::class, 'delete'])->name('delete');
        Route::get('/brand-data', [SizeController::class, 'getData'])->name('data');
    });

    //For Product
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');

        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update', [ProductController::class, 'update'])->name('update');

        Route::get('status/{id}', [ProductController::class, 'status'])->name('status');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('data', [ProductController::class, 'getData'])->name('data');
    });

    //For Flash Sales
    Route::prefix('flash-sale')->name('flash-sale.')->group(function () {
        Route::get('', [FlashSaleController::class, 'index'])->name('index');
        Route::get('create', [FlashSaleController::class, 'create'])->name('create');
        Route::post('store', [FlashSaleController::class, 'store'])->name('store');

        Route::get('edit/{id}', [FlashSaleController::class, 'edit'])->name('edit');
        Route::post('update', [FlashSaleController::class, 'update'])->name('update');

        Route::get('status/{id}', [FlashSaleController::class, 'status'])->name('status');
        Route::get('delete/{id}', [FlashSaleController::class, 'delete'])->name('delete');
        Route::get('data', [FlashSaleController::class, 'getData'])->name('data');
    });

    //For Banner
    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('', [BannerController::class, 'index'])->name('index');
        Route::get('create', [BannerController::class, 'create'])->name('create');
        Route::post('store', [BannerController::class, 'store'])->name('store');

        Route::get('edit/{id}', [BannerController::class, 'edit'])->name('edit');
        Route::post('update', [BannerController::class, 'update'])->name('update');

        Route::get('status/{id}', [BannerController::class, 'status'])->name('status');
        Route::get('delete/{id}', [BannerController::class, 'delete'])->name('delete');
        Route::get('data', [BannerController::class, 'getData'])->name('data');
    });

    //For Ad
    Route::prefix('ads')->name('ads.')->group(function () {
        Route::get('', [AdController::class, 'index'])->name('index');
        Route::get('create', [AdController::class, 'create'])->name('create');
        Route::post('store', [AdController::class, 'store'])->name('store');

        Route::get('edit/{id}', [AdController::class, 'edit'])->name('edit');
        Route::post('update', [AdController::class, 'update'])->name('update');

        Route::get('status/{id}', [AdController::class, 'status'])->name('status');
        Route::get('delete/{id}', [AdController::class, 'delete'])->name('delete');
        Route::get('data', [AdController::class, 'getData'])->name('data');
    });

    //For Coupon
    Route::prefix('coupon')->name('coupon.')->group(function () {
        Route::get('', [CouponController::class, 'index'])->name('index');
        Route::get('create', [CouponController::class, 'create'])->name('create');
        Route::post('store', [CouponController::class, 'store'])->name('store');

        Route::get('edit/{id}', [CouponController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [CouponController::class, 'update'])->name('update');

        Route::get('status/{id}', [CouponController::class, 'status'])->name('status');
        Route::get('delete/{id}', [CouponController::class, 'delete'])->name('delete');
        Route::get('data', [CouponController::class, 'getData'])->name('data');
        Route::post('status-change', [CouponController::class, 'changeStatus'])->name('status.change');
    });

    //For Support
    Route::prefix('support')->name('support.')->group(function () {
        Route::get('/', [SupportMessageController::class, 'index'])->name('index');
        Route::get('/data', [SupportMessageController::class, 'getData'])->name('data');
        Route::post('/store', [SupportMessageController::class, 'store'])->name('store');
        Route::delete('/delete/{id}', [SupportMessageController::class, 'destroy'])->name('delete');
    });
});

//For Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordPost'])->name('forgot.password.post');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');
