@extends('layouts.app')

@section('title', 'Trip Details')

@section('content')
<div id="single--booking">
    <div class="panel panel-margin">
        <div class="panel-heading">
            <div class="panel-title">
                <div>
                    <a href="/contacts" class="router-link-active">Booking</a> / {{ $booking->customer->name }}
                    <small>(#000{{ $booking->id  }})</small>
                </div>
            </div>
            <div class="panel-extra">
                <div>
                    <a href="/contacts" class="btn btn-default btn-sm router-link-active">
                        <small class="icon icon-arrow-left-c"></small>
                    </a>
                    <a href="/contacts/1/edit" class="btn btn-default btn-sm">
                    <small class="icon icon-edit"></small>
                    </a>
                    <button type="button" class="btn btn-error btn-sm">
                        <span class="icon icon-trash-b"></span>
                        <!---->
                        <!---->
                    </button>
                </div>
            </div>
        </div>

        <div class="panel-form">
            <div class="row row-line">
                <div class="col-md-6">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Pickup Address</span>
                        </label>
                        <p>{{ $booking->pickup_address }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Drop Address</span>
                        </label>
                        <p>{{ $booking->drop_address }}</p>
                    </div>
                </div>
            </div>

            <div class="row row-line">
                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Driver</span>
                        </label>
                        <p>{{ $booking->driver->name }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Vehicle</span>
                        </label>
                        <p>{{ $booking->vehicle->make }} {{ $booking->vehicle->model }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Pickup Date</span>
                        </label>
                        <p>{{ $booking->date }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Pickup Time</span>
                        </label>
                        <p>{{ $booking->pickup_time }}</p>
                    </div>
                </div>
            </div>

            <div class="row row-line">
                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Flight Number</span>
                        </label>
                        <p>{{ $booking->flight_number }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Pickup sign</span>
                        </label>
                        <p>{{ $booking->pickup_sign }}</p>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Passagers</span>
                        </label>
                        <p>{{ $booking->passagers }}</p>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Bags</span>
                        </label>
                        <p>{{ $booking->bags }}</p>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Seats</span>
                        </label>
                        <p>{{ $booking->seats }}</p>
                    </div>
                </div>
            </div>

            <div class="row row-line">
                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Customer Firstname</span>
                        </label>
                        <p>{{ $booking->customer->firstname }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Customer Lastname</span>
                        </label>
                        <p>{{ $booking->customer->lastname }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Customer Email</span>
                        </label>
                        <p>{{ $booking->customer->email }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Customer Phone</span>
                        </label>
                        <p>{{ $booking->customer->phone }}</p>
                    </div>
                </div>
            </div>

            <div class="row row-line">
                <div class="col-md-6">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Special Requests</span>
                        </label>
                        <p>{{ $booking->special_request }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-group">
                        <label class="info-label">
                            <span>Additional Info</span>
                        </label>
                        <p>{{ $booking->additional_info }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="filterable">
        <div class="panel panel-margin">
            <div class="panel-body" style="padding: 0;">
                <div class="mapouter"
                ><div class="gmap_canvas">
                        <iframe width="100%" height="600px" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/"></a>
                    </div>
                    <style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
