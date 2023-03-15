<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\UserController;



//login, register
Route::middleware(['admin_auth'])->group(function(){
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});


Route::middleware(['auth'])->group(function () {
    // ဒီထဲထည့်လိုက်လို့ auth login not found ဖြစ်နေရင် app-http-middleware-autheticate.php မှာ path ပြောင်းပေးရမယ်


    // dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth#dashboard');

    // admin
    Route::group(['middleware' => 'admin_auth'], function(){

        // category
        Route::prefix('category')->group(function () {
            Route::get( 'list', [CategoryController::class, 'list'])->name('category#list');
            Route::get( 'create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        //admin account
        Route::prefix('admin')->group(function () {
            // password
            Route::get('password/change', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('change/passord', [AdminController::class, 'changePassword'])->name('admin#changePassword');

            // account
            Route::get('account', [AdminController::class, 'accountProfile'])->name('admin#accountProfile');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');

            // admin list
            Route::get('list', [AdminController::class, 'list'])->name('admin#list');
            Route::get('delete/{id}', [AdminController::class, 'deleteAcc'])->name('admin#deleteAcc');
            Route::get('changeRole/{id}', [AdminController::class, 'changeRole'])->name('admin#changeRole');
            Route::post('change/role/{id}', [AdminController::class, 'roleChange'])->name('admin#roleChange');

        });

        // products
        Route::prefix('product')->group(function (){
            Route::get('list', [ProductController::class, 'list'])->name('product#list');
            Route::get('create/page',[ProductController::class, 'createPage'])->name('product#createPage');
            Route::post('create', [ProductController::class, 'create'])->name('product#create');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
            Route::get('details/{id}', [ProductController::class, 'details'])->name('product#details');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
            Route::post('update', [ProductController::class, 'update'])->name('product#update');

        });


    });



    // user
    // home page
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function(){
        // Route::get('home', function(){
        //     return view('user.home');
        // })->name('user#home');

        Route::get('home', [UserController::class, 'home'])->name('user#home');

        Route::prefix('password')->group(function () {
            Route::get('change', [UserController::class, 'changePasswordPage'])->name('user#changePasswordPage');
            Route::post('change', [UserController::class, 'changePassword'])->name('user#changePassword');
        });

        Route::prefix('account')->group(function () {
            Route::get('change', [UserController::class, 'accountChangePage'])->name('user#accountChangePage');
            Route::post('change/{id}', [UserController::class, 'accountChange'])->name('user#accountChange');
        });
    });
});





