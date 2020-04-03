<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    Route::get('/purchaslisting', 'PurchasCrudController@purchaselisting');
    Route::get('/allrecept', 'PurchaseReceiptCrudController@allrecept');
    Route::get('/product/search/{search}', 'ProductCrudController@search');
    Route::get('/product/search/', 'ProductCrudController@search');
    Route::post('/purchaselisting/createlisting ','OtherController@createlisting');
    Route::get('/allproductbelogntopurchase/{id}','OtherController@allproductbelogntopurchase');

    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('company', 'CompanyCrudController');
    CRUD::resource('supplier', 'SupplierCrudController');
    CRUD::resource('customer', 'CustomerCrudController');
    CRUD::resource('unit', 'UnitCrudController');
    CRUD::resource('bank', 'BankCrudController');
    CRUD::resource('employee', 'EmployeeCrudController');
    CRUD::resource('income', 'IncomeCrudController');
    CRUD::resource('expanse', 'ExpanseCrudController');
    CRUD::resource('purchasereceipt', 'PurchaseReceiptCrudController');
    CRUD::resource('purchas', 'PurchasCrudController');
}); // this should be the absolute last line of this file