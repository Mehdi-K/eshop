<?php

use App\Http\Livewire\AboutUs;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminProfile;
use App\Http\Livewire\Admin\Categories\IndexCategories;
use App\Http\Livewire\Admin\Products\IndexProducts;
use App\Http\Livewire\Admin\Users\IndexUsers;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Home;
use App\Http\Livewire\Uploads;
use App\Http\Livewire\User\ProductDetails;
use App\Http\Livewire\User\Shop;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\User\UserProfile;
use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;


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

// Routes for Guests and Public Pages:
    Route::get('/', Home::class);
    Route::get('/about-us', AboutUs::class)->name('aboutus');
    Route::get('/contact-us', ContactUs::class)->name('contactus');

// Routes for normal Users and Customers.
Route::middleware(['auth:sanctum', 'verified' ] )->group(function(){

    Route::get('/user/dashboard', UserDashboard::class)->name('user_dashboard');

    Route::get('/user/profile', UserProfile::class)->name('user_profile');

    Route::get('/user/shop', Shop::class)->name('user_shop');

    Route::get('/user/product-details/{slug}', ProductDetails::class)->name('product.details');

});

// Routes for Admins. Admins have access to all pages.
Route::middleware(['auth:sanctum', 'verified', 'adminauth'] )->group(function(){

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin_dashboard');

    Route::get('/admin/profile', AdminProfile::class)->name('admin_profile');

    Route::get('/admin/categories/index', IndexCategories::class)->name('admin_categories');

    Route::get('/admin/products/index', IndexProducts::class)->name('admin_products');

    Route::get('/admin/users/index', IndexUsers::class)->name('admin_users');

    Route::get('/photo', Uploads::class);

});

