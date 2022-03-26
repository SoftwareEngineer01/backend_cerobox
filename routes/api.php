<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//AUTH
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::post('auth/logout', 'AuthController@logout')->middleware(['auth:sanctum']);


/*SANCTUM*/
Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Customer
    Route::get('/customers', 'CustomerController@getCustomers');
    Route::get('/customers/{id}', 'CustomerController@getCustomerById');
    Route::post('/customers', 'CustomerController@addCustomer');
    Route::post('/customers/{id}', 'CustomerController@updateCustomer');
    Route::post('customers/deleteCustomer/{id}', 'CustomerController@deleteCustomer');

    // Service
    Route::get('/services', 'ServiceController@getServices');
    Route::get('/services/{id}', 'ServiceController@getServiceById');
    Route::post('/services', 'ServiceController@addService');
    Route::post('/services/{id}', 'ServiceController@updateService');
    Route::post('services/deleteService/{id}', 'ServiceController@deleteService');

});

