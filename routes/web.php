<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MpesaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/viewSales', [SuperController::class, 'viewSales']);
    Route::get('/deleteSale{id}', [SuperController::class, 'deleteSale']);
    Route::post('/filterSales', [SuperController::class, 'filterSales']);
    Route::get('/viewCart', [SuperController::class, 'viewCart']);
    Route::get('/viewProduct', [SuperController::class, 'viewProduct']);
    Route::post('/addToCartAll', [SuperController::class, 'addToCartAll']);
    Route::post('/addToCart/{productId}', [SuperController::class, 'addToCart']);
    Route::post('/deleteCartItem/{id}', [SuperController::class, 'deleteCartItem']);
    Route::get('/searchProductCart', [SuperController::class, 'searchProductCart']);
    Route::get('/related-products', [ProductController::class, 'relatedProducts']);
    Route::post('/addCart', [SuperController::class, 'addCart']);
    Route::get('/getCartItems', [SuperController::class, 'getCartItems']);
    Route::get('/getCartItem/{productId}', [SuperController::class, 'getCartItem']);
    Route::get('/removeFromCart/{cartItemId}', [SuperController::class, 'removeFromCart']);
    Route::get('/updateCart/{cartItemId}', [SuperController::class, 'updateCart']);
    Route::post('/updateCart/{id}', [SuperController::class, 'updateCartItem']);
    Route::post('/clearAllItems', [SuperController::class, 'clearAllItems']);
    Route::get('/checkout', [SuperController::class, 'checkout']);
    Route::get('/debtItems', [SuperController::class, 'debtItems']);
    Route::post('/holdCart', [SuperController::class, 'holdCart']);
    Route::get('/calculateTotalAmount', [SuperController::class, 'calculateTotalAmount']);
    Route::post('/resumeCart/{cartId}', [SuperController::class, 'resumeCart']);
    Route::get('/getHeldCarts', [SuperController::class, 'getHeldCarts']);
    Route::post('/deleteCart/{cartId}', [SuperController::class, 'deleteCart']);
    Route::get('/createCart/{productId}', [SuperController::class, 'createCart']);
    Route::post('/addToDebt', [SuperController::class, 'addToDebt']);
    Route::get('/viewDebts', [SuperController::class, 'viewDebts']);
    Route::get('debtItems/{debtId}', [SuperController::class, 'viewDebtItems']);
    Route::post('/settleDebt', [SuperController::class, 'settleDebt']);
    Route::get('/searchSalesCart', [SuperController::class, 'searchSalesCart']);
    Route::get('/searchProduct', [SuperController::class, 'searchProduct']);
    Route::get('/searchDebt', [SuperController::class, 'searchDebt']);
    Route::get('/processPayment', [SuperController::class, 'processPayment']);
    Route::get('/stockReports', [SuperController::class, 'stockReports']);
   

    Route::get('/home', [SuperController::class, 'home']);
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/homeAdmin', [AdminController::class, 'homeAdmin']);
    });
    
    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/homeUser', [UserController::class, 'homeUser']);
    });
    
    // Category Routes
    Route::get('/view_category', [AdminController::class, 'view_category']);
    Route::post('/add_category', [AdminController::class, 'add_category']);
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

    // Product Routes
    Route::get('/view_product', [AdminController::class, 'view_product']);
    Route::post('/add_product', [AdminController::class, 'add_product']);
    Route::get('/show_product', [AdminController::class, 'show_product']);
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
    Route::post('/update_product/{id}', [AdminController::class, 'update_product']);
    Route::post('/importProducts', [AdminController::class, 'importProducts']);
    Route::get('/exportSales', [AdminController::class, 'exportSales']);
    Route::get('/search', [AdminController::class, 'search']);
    Route::get('/searchSales', [AdminController::class, 'searchSales']);
    Route::post('/filterSalesAdmin', [AdminController::class, 'filterSalesAdmin']);
    Route::post('/clearAllproducts', [AdminController::class, 'clearAllproducts']);

    // Sales Routes
    Route::get('/view_sales', [AdminController::class, 'view_sales']);

    // Orders Routes
    Route::get('/show_orders', [AdminController::class, 'show_orders']);
    Route::get('/viewCustomeradmin', [AdminController::class, 'viewCustomeradmin']);
    Route::get('/searchCustomeradmin', [AdminController::class, 'searchCustomeradmin']);
    Route::get('/editCustomeradmin/{id}', [AdminController::class, 'editCustomeradmin']);
    Route::get('/destroyCustomeradmin/{id}', [AdminController::class, 'destroyCustomeradmin']);
    Route::put('/updateCustomeradmin/{id}', [AdminController::class, 'updateCustomeradmin']);

    // Customers Routes
    Route::get('/viewCustomer', [SuperController::class, 'viewCustomer']);
    Route::get('/createCustomer', [SuperController::class, 'createCustomer']);
    Route::post('/storeCustomer', [SuperController::class, 'storeCustomer']);
    Route::get('/showCustomer/{id}', [SuperController::class, 'showCustomer']);
    Route::get('/editCustomer/{id}', [SuperController::class, 'editCustomer']);
    Route::put('/updateCustomer/{id}', [SuperController::class, 'updateCustomer']);
    Route::get('/destroyCustomer/{id}', [SuperController::class, 'destroyCustomer']);
    Route::get('/searchCustomer', [SuperController::class, 'searchCustomer']);
    Route::get('/searchSupplier', [SuperController::class, 'searchSupplier']);

    // Suppliers Routes
    Route::get('/viewSupplier', [SuperController::class, 'viewSupplier']);
    Route::get('/createSupplier', [SuperController::class, 'createSupplier']);
    Route::post('/storeSupplier', [SuperController::class, 'storeSupplier']);
    Route::get('/showSupplier/{id}', [SuperController::class, 'showSupplier']);
    Route::get('/editSupplier/{id}', [SuperController::class, 'editSupplier']);
    Route::post('/updateSupplier/{id}', [SuperController::class, 'updateSupplier']);
    Route::delete('/destroySupplier/{id}', [SuperController::class, 'destroySupplier']);

    Route::post('/stkpush', [MpesaController::class, 'stkPush']);
Route::post('/mpesa/callback', [MpesaController::class, 'callback'])->name('mpesa.callback');
});


require __DIR__.'/auth.php';
