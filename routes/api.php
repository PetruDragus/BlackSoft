<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('bookings', 'BookingController@getData');
Route::get('bookings/all', 'BookingController@index');
Route::get('invoices', 'InvoiceController@getData');
Route::get('drivers', 'DriverController@getData');
Route::get('reviews', 'ReviewController@getData');
Route::get('contacts', 'ContactController@getData');
Route::get('cities', 'CityController@getData');
Route::get('jobs', 'JobController@getData');
Route::get('jobApplication', 'JobApplicationController@getData');
Route::get('customers', 'CustomerController@getData');
Route::get('users', 'UserController@getData');
Route::get('leads', 'LeadController@getData');
Route::get('vehicles', 'VehicleController@getData');
Route::get('payments', 'PaymentController@getData');
Route::get('opportunities', 'OpportunityController@getData');
Route::get('products', 'ProductController@search');
