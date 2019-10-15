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

Route::get('/profile', function () {
    return view('pages.users.profile');
});

Route::get('/calendar', function () {
    return view('pages.calendar.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/drivers', 'DriverController');
Route::resource('/invoices', 'InvoiceController');
Route::resource('/reviews', 'ReviewController');
Route::resource('/vehicles', 'VehicleController');
Route::resource('/users', 'UserController');
Route::resource('/contacts', 'ContactController');
Route::resource('/customers', 'CustomerController');
Route::resource('/cities', 'CityController');
Route::resource('/leads', 'LeadController');
Route::resource('/opportunities', 'OpportunityController');
Route::resource('/', 'DashboardController');
Route::resource('/jobs', 'JobController');
Route::resource('/applications', 'JobApplicationController');
Route::resource('/profile', 'ProfileController');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/bookings', 'BookingController');
    Route::resource('/payments', 'PaymentController');
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
});

Route::group(['prefix' => 'settings', 'as' => 'settings.'], function(){
    Route::resource('', 'SettingController');
    Route::get('/payment', 'SettingController@getPaymentScreen');
    Route::get('/company', 'SettingController@getCompanyScreen');
});


Route::group(['prefix' => 'mobile', 'as' => 'mobile.'], function(){
    Route::get('/bookings', 'API\BookingController@index');
});

Route::get('/events', 'HomeController@Events');

Route::get('/test', 'API\BookingController@test');