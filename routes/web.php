<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/calendar', function () {
    return view('pages.calendar.index');
});

Route::get('/mails', function () {
    return view('emails.test');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/bookings', 'BookingController');
    Route::resource('/payments', 'PaymentController');
    Route::resource('/drivers', 'DriverController');
    Route::resource('/invoices', 'InvoiceController');
    Route::resource('/reviews', 'ReviewController');
    Route::resource('/vehicle-reviews', 'VehicleReviewController');
    Route::resource('/vehicles', 'VehicleController');
    Route::resource('/users', 'UserController');
    Route::resource('/contacts', 'ContactController');
    Route::resource('/customers', 'CustomerController');
    Route::resource('/cities', 'CityController');
    Route::resource('/leads', 'LeadController');
    Route::resource('/opportunities', 'OpportunityController');
    Route::resource('/', 'DashboardController');
    Route::resource('/jobs', 'JobController');
    Route::resource('/contact-form', 'ContactFormController');
    Route::resource('/applications', 'JobApplicationController');
    Route::resource('/profile', 'ProfileController');
    Route::resource('/dispatch', 'DispatchController');
    Route::resource('/coupons', 'CouponController');
    Route::resource('/flat-rates', 'FlatRateController');
});

Route::get('/api/book', 'BookingController@ApiBooking');
Route::post('/api/booking/generatePrice/{id}', 'BookingController@generatePrice');

Route::group(['prefix' => 'export', 'as' => 'export.'], function(){
    // Export to excel
    Route::get('/contacts/exportExcel', 'ContactController@exportExcel');
    Route::get('/bookings/exportExcel', 'BookingController@exportExcel');
    Route::get('/invoices/exportExcel', 'InvoiceController@exportExcel');
    Route::get('/payments/exportExcel', 'PaymentController@exportExcel');
    Route::get('/reviews/exportExcel', 'ReviewController@exportExcel');
    Route::get('/customers/exportExcel', 'CustomerController@exportExcel');
    Route::get('/users/exportExcel', 'UserController@exportExcel');
    Route::get('/vehicles/exportExcel', 'VehicleController@exportExcel');
    Route::get('/cities/exportExcel', 'CityController@exportExcel');
    Route::get('/jobs/exportExcel', 'JobController@exportExcel');
    Route::get('/contact-form/exportExcel', 'ContactFormController@exportExcel');

    // Export to csv
    Route::get('/contacts/exportCSV', 'ContactController@exportCSV');
    Route::get('/bookings/exportCSV', 'BookingController@exportCSV');
    Route::get('/invoices/exportCSV', 'InvoiceController@exportCSV');
    Route::get('/payments/exportCSV', 'PaymentController@exportCSV');
    Route::get('/reviews/exportCSV', 'ReviewController@exportCSV');
    Route::get('/customers/exportCSV', 'CustomerController@exportCSV');
    Route::get('/users/exportCSV', 'UserController@exportCSV');
    Route::get('/vehicles/exportCSV', 'VehicleController@exportCSV');
    Route::get('/cities/exportCSV', 'CityController@exportCSV');
    Route::get('/jobs/exportCSV', 'JobController@exportCSV');
    Route::get('/contact-form/exportCSV', 'ContactFormController@exportCSV');

    // Export to PDF
});

Route::group(['prefix' => 'settings', 'as' => 'settings.'], function(){
    Route::resource('', 'SettingController');
    Route::get('/payment', 'SettingController@getPaymentScreen');
    Route::get('/company', 'SettingController@getCompanyScreen');
});

Route::get('/events', 'HomeController@Events');
Route::get('/test', 'API\BookingController@test');
Route::get('/booking/cancelled', 'BookingController@cancelled');

Route::get('/update/status/{id}', 'BookingController@min60form');
Route::get('/update/status/arrived/{id}', 'BookingController@arrivedForm');
Route::get('/update/status/finish/{id}', 'BookingController@finishForm');

Route::post('/update/status/{id}', 'BookingController@min60status')->name('update.status60min');
Route::post('/update/status/arrived/{id}', 'BookingController@arrivedStatus')->name('update.statusArrived');
Route::post('/update/status/finish/{id}', 'BookingController@finishStatus')->name('update.finishStatus');


Route::get("ical-events/{id}", "BookingController@getEventsICalObject");