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

    Route::get('invoices', 'Controllers\InvoiceController@index');
    Route::get('invoices/{id}', 'Controllers\InvoiceController@show');

    Route::get('staff/{rep}', 'Controllers\SalesController@getStaff');

    Route::get('inventory', 'Controllers\InventoryController@index');
    Route::get('inventory/order', 'Controllers\InventoryController@order');
    Route::get('inventory/{id}', 'Controllers\InventoryController@show');
    Route::get('inventory/sales-history/{id}', 'Controllers\InventoryController@history');

    Route::get('repair-orders', 'Controllers\RepairOrdersController@index');
    Route::get('repair-orders/{orderNum}', 'Controllers\RepairOrdersController@show'); //Change to post to api.batteriespos.dev/v0/repair-orders

    Route::get('part-orders', 'Controllers\PartOrdersController@index');
    Route::get('part-orders/{orderNum}', 'Controllers\PartOrdersController@show');

    Route::get('customers', 'Controllers\CustomersController@index');

    Route::get('close-out', 'Controllers\CloseOutController@index');

    Route::get('print/sales/{id}', 'Controllers\PrintController@sales_invoice');
    Route::get('print/repair-order/{id}', 'Controllers\PrintController@repair_order_invoice');
    Route::get('print/part-order/{id}', 'Controllers\PrintController@part_order_invoice');
    Route::get('print/close-out/{date}', 'Controllers\PrintController@close_out');

    Route::group(['prefix' => 'admin'], function () {
        Route::get('dashboard', 'Controllers\Admin\DashboardController@index');

        Route::get('inventory/edit', 'Controllers\Admin\InventoryController@index');
    });
});

Route::group(['middleware' => ['auth:api', 'web'], 'domain' => 'batteriespos.dev'], function () {
    //Note: Must use Auth::gaurd('api')->user();

    Route::group(['prefix' => 'api/v0'], function () {
        Route::get('/', function() {
            return 'test';
        });

        Route::get('customers', 'Api\Controllers\CustomersController@index');
        Route::post('customers', 'Api\Controllers\CustomersController@store');
        Route::post('customers/update', 'Api\Controllers\CustomersController@update');
        Route::get('inventory', 'Api\Controllers\InventoryController@index');
        Route::get('invoice', 'Api\Controllers\InvoiceController@index');
        Route::get('sales', 'Api\Controllers\SalesController@index');
        Route::post('sales', 'Api\Controllers\SalesController@store');
        Route::get('purchases', 'Api\Controllers\PurchasesController@index');
        Route::get('staff', 'Api\Controllers\StaffController@index');
        Route::get('vendor-invoices', 'Api\Controllers\VendorInvoicesController@index');
        Route::get('user', 'Api\Controllers\UserController@index');

        Route::get('daily-stats', 'Api\Controllers\DailyStatsController@index');

        Route::get('qoh', 'Api\Controllers\QuantityOnHandController@index');
        Route::get('location', 'Api\Controllers\LocationsController@index');

        Route::get('repair-orders', 'Api\Controllers\RepairOrdersController@index');
        Route::get('repair-orders/{orderNum}', 'Api\Controllers\RepairOrdersController@show');
        Route::post('repair-orders', 'Api\Controllers\RepairOrdersController@store');

        Route::get('part-orders', 'Api\Controllers\PartOrdersController@index');
        Route::get('part-orders/{orderNum}', 'Api\Controllers\PartOrdersController@show');
        Route::post('part-orders', 'Api\Controllers\PartOrdersController@store');
        Route::post('part-orders/{orderNum', 'Api\Controllers\PartOrdersController@update');

        Route::get('close-out', 'Api\Controllers\CloseOutController@index');
        Route::post('close-out', 'Api\Controllers\CloseOutController@store');

        Route::get('settings', 'Api\Controllers\SettingsController@index');

    });
});

Route::group(['middleware' => ['auth:api', 'web', 'admin'], 'prefix' => 'api/v0/admin'], function () {
    //Admin API Routes
    Route::get('inventory', 'Api\Controllers\Admin\InventoryController@index');
    Route::post('inventory/update', 'Api\Controllers\Admin\InventoryController@update');

    Route::get('categories', 'Api\Controllers\Admin\CategoriesController@index');
    Route::post('categories', 'Api\Controllers\Admin\CategoriesController@update');

    Route::post('staff/add', 'Api\Controllers\Admin\StaffController@store');
});


Route::group(['middleware' => ['web', 'admin'], 'domain' => 'batteriespos.dev'], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', 'Controllers\Admin\DashboardController@index');

        Route::get('/staff', 'Controllers\Admin\StaffController@index');

        
    });

});