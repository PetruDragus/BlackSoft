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
Route::get('v1/bookings/cancelled', 'API\BookingController@cancelled');
Route::match(['put', 'patch'], 'v1/bookings/changeDriver/{id}', 'API\BookingController@changeDriver');
Route::match(['put', 'patch'], 'v1/bookings/cancel/{id}', 'API\BookingController@cancelBooking');
Route::get('v1/flat-rates/all', 'API\FlatRateController@getFlatRates');

Route::apiResources(['v1/bookings' => 'API\BookingController']);
Route::apiResources(['v1/flat-rates' => 'API\FlatRateController']);
Route::apiResources(['v1/drivers' => 'API\DriverController']);
Route::apiResources(['v1/contacts' => 'API\ContactController']);
Route::apiResources(['v1/customers' => 'API\CustomerController']);
Route::apiResources(['v1/reviews' => 'API\ReviewController']);
Route::apiResources(['v1/vehicle_reviews' => 'API\VehicleReviewController']);
Route::apiResources(['v1/invoices' => 'API\InvoiceController']);
Route::apiResources(['v1/jobs' => 'API\JobsController']);
Route::apiResources(['v1/jobApplication' => 'API\JobApplicationController']);
Route::apiResources(['v1/vehicles' => 'API\VehicleController']);
Route::apiResources(['v1/cities' => 'API\CitiesController']);
Route::apiResources(['v1/payments' => 'API\PaymentController']);
Route::apiResources(['v1/users' => 'API\UserController']);
Route::apiResources(['v1/contact-form' => 'API\ContactFormController']);
Route::apiResources(['v1/coupons' => 'API\CouponController']);
Route::apiResources(['v1/categories' => 'API\CategorieController']);
Route::apiResources(['v1/flat-rates' => 'API\FlatRateController']);

// Mobile app route
Route::get('v2/bookings/ended/{driver}', 'API\BookingController@getFinishedBookings');
Route::get('v2/bookings/pending', 'API\BookingController@getPendingBookings');
Route::get('v2/bookings/onway/{driver}', 'API\BookingController@getOnWayBookings');
Route::get('v2/bookings/finished', 'API\BookingController@getFinishedBookings');
Route::put('v2/booking/changeDriver/{id}', 'API\BookingController@changeDriver');
Route::put('v2/booking/updateStatus/{id}', 'API\BookingController@updateStatus');
Route::get('v2/reviews/driverReviews/{id}', 'API\ReviewController@getDriverReviews');
Route::get('v2/reviews/vehicleReviews/{id}', 'API\VehicleReviewController@getVehicleReviews');

Route::put('v3/booking/accept/{id}', 'API\BookingController@acceptTrip');
Route::put('v3/booking/reject/{id}', 'API\BookingController@rejectTrip');
Route::put('v3/booking/cancel/{id}', 'API\BookingController@cancelTrip');