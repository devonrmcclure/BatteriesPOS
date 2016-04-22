<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web'], 'domain' => 'batteriespos.dev'], function () {
    Route::auth();

    Route::get('/', 'Controllers\HomeController@index');

    Route::resource('sales', 'Controllers\SalesController');

    Route::get('sales/getProduct/{id}', 'Controllers\SalesController@getProductByID');
    Route::get('customers/getCustomer/{phone}', 'Controllers\CustomersController@getCustomerByPhone');

    Route::resource('admin/purchase/history', 'Controllers\PurchasesController');
    Route::get('admin/purchase/getProduct/{id}', 'Controllers\PurchasesController@getProduct');

    Route::get('staff/{rep}', 'Controllers\SalesController@getStaff');

    Route::get('inventory', 'Controllers\InventoryController@index');
});

Route::group(['middleware' => ['auth:api'], 'domain' => 'api.batteriespos.dev'], function () {
    //Note: Must use Auth::gaurd('api')->user();
    Route::get('/', function() {
        echo 'TODO: show API versions.';
    });

    Route::group(['prefix' => 'v0'], function () {
        Route::get('/', function() {
            return 'test';
        });

        Route::get('customers', 'Api\Controllers\CustomersController@index');
        Route::get('inventory', 'Api\Controllers\InventoryController@index');
        Route::get('invoice', 'Api\Controllers\InvoiceController@index');
        Route::get('sales', 'Api\Controllers\SalesController@index');
        Route::post('sales', 'Api\Controllers\SalesController@store');
        Route::get('purchases', 'Api\Controllers\PurchasesController@index');
        Route::get('staff', 'Api\Controllers\StaffController@index');
        Route::get('vendor-invoices', 'Api\Controllers\VendorInvoicesController@index');
        Route::get('user', 'Api\Controllers\UserController@index');

        Route::get('daily-stats', 'Api\Controllers\DailyStatsController@index');
    });
});