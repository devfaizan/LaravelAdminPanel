<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\SupplierPaymentController;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth/register');
    });
    Route::view('/registerview', 'auth/register');
    Route::post('/register', [AdminController::class, 'adminRegister']);
    Route::view('/loginview', 'auth/login');
    Route::post('/login', [AdminController::class, 'adminLogin']);
    Route::get('/reset', function () {
        return view('auth/resetpassword');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [AdminController::class, 'adminHome'])->name('home');
    Route::post('/logout', [AdminController::class, 'adminLogout']);
    Route::view('/updateprofile', 'auth/updateprofile');
    Route::post('/updateprofile', [AdminController::class, 'updateProfile']);

    Route::view('/suppliers', 'suppliers/suppliers');
    Route::get('/suppliers', [SupplierController::class, 'showSuppliers']);
    Route::view('/addsupplier', 'suppliers/addsupplier');
    Route::post('/addsupplier', [SupplierController::class, 'addSupplier']);
    Route::get('/editsupplier/{id}', [SupplierController::class, 'editSupplier'])->name('editsupplier');
    Route::post('/updatesupplier/{id}', [SupplierController::class, 'updateSupplier'])->name('updatesupplier');
    Route::get('/deletesupplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('deletesupplier');

    Route::view('/products', 'products/products');
    Route::get('/products', [ProductController::class, 'showProducts']);
    Route::get('/getproducts', [ProductController::class, 'getProducts']);
    Route::view('/addproduct', 'products/addproduct');
    Route::post('/addproduct', [ProductController::class, 'addProduct']);
    Route::get('/editproduct/{id}', [ProductController::class, 'editProduct'])->name('editproduct');
    Route::put('/updateproduct/{id}', [ProductController::class, 'updateProduct'])->name('updateproduct');
    Route::post('/updateproduct/{id}', [ProductController::class, 'updateProduct'])->name('updateproduct');
    Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteproduct');
    Route::delete('/delete-image/{id}', [ProductController::class, 'deleteImage'])->name('delete.image');

    Route::view('/stocks', 'stocks/stocks');
    Route::get('/stocks', [StockController::class, 'showStocks']);
    Route::view('/addstock', 'stocks/addstock');
    Route::post('/addstock', [StockController::class, 'addStock']);
    Route::get('/editstock/{id}', [StockController::class, 'editStock'])->name('editstock');
    Route::post('/updatestock/{id}', [StockController::class, 'updateStock'])->name('updatestock');
    Route::get('/deletestock/{id}', [StockController::class, 'deleteStock'])->name('deletestock');

    Route::get('/orders/{status?}', [OrderController::class, 'showOrders']);
    Route::get('/editorder/{id}', [OrderController::class, 'editOrder'])->name('editorder');
    Route::post('/updateorder/{id}', [OrderController::class, 'updateOrder'])->name('updateorder');

    Route::view('/mainpayment', 'mainpayment');
    Route::view('/supplierpayment', 'payments/supplierpayments/payments');
    Route::get('/supplierpayment', [SupplierPaymentController::class, 'showSupplierPayments']);
    Route::view('/addsupplierpayment', 'payments/supplierpayments/addpayment');
    Route::post('/addsupplierpayment', [SupplierPaymentController::class, 'addSupplierPayment']);
    Route::get('/editsupplierpayment/{id}', [SupplierPaymentController::class, 'editSupplierPayment'])->name('editsupplierpayment');
    Route::post('/updatesupplierpayment/{id}', [SupplierPaymentController::class, 'updateSupplierPayment'])->name('updatesupplierpayment');
    Route::get('/deletesupplierpayment/{id}', [SupplierPaymentController::class, 'deleteSupplierPayment'])->name('deletesupplierpayment');

    Route::view('/customerpayment', 'payments/customerpayments/payments');
    Route::get('/customerpayment', [CustomerPaymentController::class, 'showCustomerPayments']);
    Route::view('/addcustomerpayment', 'payments/customerpayments/addpayment');
    Route::post('/addcustomerpayment', [CustomerPaymentController::class, 'addCustomerPayment']);
    Route::get('/editcustomerpayment/{id}', [CustomerPaymentController::class, 'editCustomerPayment'])->name('editcustomerpayment');
    Route::post('/updatecustomerpayment/{id}', [CustomerPaymentController::class, 'updateCustomerPayment'])->name('updatecustomerpayment');
    Route::get('/deletecustomerpayment/{id}', [CustomerPaymentController::class, 'deleteCustomerPayment'])->name('deletecustomerpayment');
});