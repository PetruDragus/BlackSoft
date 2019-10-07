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


// Get Data method endpoint
Route::get('drivers', 'DriverController@getData');
Route::get('cities', 'CityController@getData');
Route::get('users', 'UserController@getData');
Route::get('leads', 'LeadController@getData');
Route::get('vehicles', 'VehicleController@getData');
Route::get('payments', 'PaymentController@getData');
Route::get('opportunities', 'OpportunityController@getData');
Route::get('products', 'ProductController@search');

Route::apiResources(['v1/bookings' => 'API\BookingController']);
Route::apiResources(['v1/drivers' => 'API\DriverController']);
Route::apiResources(['v1/contacts' => 'API\ContactController']);
Route::apiResources(['v1/customers' => 'API\CustomerController']);
Route::apiResources(['v1/reviews' => 'API\ReviewController']);
Route::apiResources(['v1/invoices' => 'API\InvoiceController']);
Route::apiResources(['v1/jobs' => 'API\JobsController']);
Route::apiResources(['v1/jobApplication' => 'API\JobApplicationController']);