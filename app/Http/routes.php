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

Route::group(['middleware' => 'web', 'domain' => 'batteriespos.dev'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::resource('sales', 'SalesController');

    Route::get('sales/getProduct/{id}', 'SalesController@getProductByID');
    Route::get('customers/getCustomer/{phone}', 'CustomersController@getCustomerByPhone');

    Route::resource('admin/purchase/history', 'PurchasesController');
    Route::get('admin/purchase/getProduct/{id}', 'PurchasesController@getProduct');

    Route::get('staff/{rep}', 'SalesController@getStaff');

});

Route::group(['domain' => 'api.batteriespos.dev'], function () {
	Route::get('/', function () {
		return 'BatteriesPOS API v0.0.1';

	});
});