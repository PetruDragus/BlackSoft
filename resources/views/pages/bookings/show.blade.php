@extends('layouts.app')

@section('title', 'Trip Details')

@section('content')
<div id="single--booking">

    @php
        $date = $booking->date;
        $d    = new \Carbon\Carbon($date);
        $month =  $d->format('F');
        $full = $d->format('MMMM Do YYYY');
    @endphp

    <div style="  display: flex;">
        <span class="circle">
            <p class="day">{{ $d->day }}</p>
            <p class="month">{{ $month }}</p>
        </span>

        <div class="booking-header mx-auto">
            <div class="row">
                <div class="col-md-3 inline-cardex">
                    <h5 class="day-title">{{ $d->format('l') }}</h5>
                    <p class="complet-date">{{ $d->isoFormat('MMM Do YYYY')  }} {{ $booking->pickup_hour }}:{{ $booking->pickup_min }}</p>
                    <p class="complet-date">{{ $booking->pickup_address }}</p>
                </div>
                <div class="col-md-3 inline-cardex">
                    <h6 class="medium-title">Assigned to:</h6>

                    <div style="display: flex;">
                        <div>
                            <img class="avatar-r3" src="https://app.blackhansa.de/storage/phpfa6njv.jpeg" width="50">
                        </div>

                        <div style="display:grid;">
                            <span class="assigned-name">Dragus Patrick</span>
                            <span class="assigned-vehicle">First Class</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 inline-cardex">
                    <h6 class="medium-title">Status</h6>
                    <div>
                        @if ($booking->status == 'Pending')
                            <span class="status status-gray" >
                                <span class="status-text">{{ $booking->status }}</span>
                            </span>
                        @elseif($booking->status == '60 min')
                            <span class="status status-60min">
                                <span class="status-text">{{ $booking->status }}</span>
                            </span>
                        @elseif($booking->status == 'Arrived')
                            <span class="status status-arrived">
                                <span class="status-text">{{ $booking->status }}</span>
                            </span>
                        @elseif($booking->status == 'Cancelled')
                            <span class="status status-pink">
                                <span class="status-text">{{ $booking->status }}</span>
                            </span>
                        @elseif($booking->status == 'Accepted')
                            <span class="status status-blue">
                                <span class="status-text">{{ $booking->status }}</span>
                            </span>
                        @elseif($booking->status == 'Finished')
                            <span class="status status-green">
                                <span class="status-text">{{ $booking->status }}</span>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    dsaf
                </div>
            </div>
        </div>
    </div>


    <div class="booking-body mx-auto">
        <div class="row">
            <div class="col-md-6 informations-column">

                <h5>Trip Information</h5>

                <ul>
                    <li>
                        <span class="left-col">Trip Number</span>
                        <span class="right-col">nr. {{ $booking->number }}</span>
                    </li>

                    <li>
                        <span class="left-col">Order On</span>
                        <span class="right-col">{{ $booking->created_at }}</span>
                    </li>

                    <li>
                        <span class="left-col">From</span>
                        <span class="right-col">{{ $booking->pickup_address }}</span>
                    </li>

                    <li>
                        <span class="left-col">To</span>
                        <span class="right-col">{{ $booking->drop_address }}</span>
                    </li>

                    <li>
                        <span class="left-col">Distance</span>
                        <span class="right-col">244km (3 hours 6 mins)</span>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 informations-column">
                <h5>Passenger Information</h5>

                <ul>
                    <li>
                        <span class="left-col">Full Name</span>
                        <span class="right-col">{{ $booking->customer->name }}</span>
                    </li>

                    <li>
                        <span class="left-col">Phone No.</span>
                        <span class="right-col">{{ $booking->customer->phone }}</span>
                    </li>

                    <li>
                        <span class="left-col">Email</span>
                        <span class="right-col">{{ $booking->customer->email }}</span>
                    </li>

                    <li>
                        <span class="left-col">Special Request</span>
                        <span class="right-col">{{ $booking->special_request }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row" style="text-align: left;">
            <div class="col-md-6" style="margin-top:15px;">
                <h5>Additional Information</h5>
                <p style="color: #a8abad;font-weight: 600;">
                    {{ $booking->additional_info }}
                </p>
            </div>

            <div class="col-md-6" style="margin-top:15px;display: inline-flex;">
                <h5 style=" width: 75%;text-align: left;display: block;float: left;font-size:20px;color: #5e5e5e;">TOTAL</h5>
                <span style="font-weight: 600;width: 50%;text-align: right;display: block;float: right;font-size:20px;color:#5e5e5e;">
                    € {{ $booking->price }} EUR
                </span>
            </div>
        </div>
    </div>



{{--    <div class="panel panel-margin">--}}
{{--        <div class="panel-heading">--}}
{{--            <div class="panel-title">--}}
{{--                <div>--}}
{{--                    <a href="/contacts" class="router-link-active">Booking</a> / {{ $booking->customer->name }}--}}
{{--                    <small>(#{{ $booking->number  }})</small>--}}

{{--                    @if ($booking->status == 'Pending')--}}
{{--                        <span class="status status-gray" >--}}
{{--                            <span class="status-text">{{ $booking->status }}</span>--}}
{{--                        </span>--}}
{{--                    @elseif($booking->status == '60 min')--}}
{{--                        <span class="status status-60min">--}}
{{--                            <span class="status-text">{{ $booking->status }}</span>--}}
{{--                        </span>--}}
{{--                    @elseif($booking->status == 'Arrived')--}}
{{--                        <span class="status status-arrived">--}}
{{--                            <span class="status-text">{{ $booking->status }}</span>--}}
{{--                        </span>--}}
{{--                    @elseif($booking->status == 'Cancelled')--}}
{{--                        <span class="status status-pink">--}}
{{--                            <span class="status-text">{{ $booking->status }}</span>--}}
{{--                        </span>--}}
{{--                    @elseif($booking->status == 'Finished')--}}
{{--                        <span class="status status-green">--}}
{{--                            <span class="status-text">{{ $booking->status }}</span>--}}
{{--                        </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="panel-extra">--}}
{{--                <div>--}}
{{--                    <a href="/bookings" class="btn btn-default btn-sm router-link-active">--}}
{{--                        <small class="icon icon-arrow-left-c"></small>--}}
{{--                    </a>--}}
{{--                    <a href="/bookings/{{ $booking->id }}/edit" class="btn btn-default btn-sm">--}}
{{--                    <small class="icon icon-edit"></small>--}}
{{--                    </a>--}}
{{--                    <button type="button" class="btn btn-error btn-sm">--}}
{{--                        <span class="icon icon-trash-b"></span>--}}
{{--                        <!---->--}}
{{--                        <!---->--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="panel-form">--}}
{{--            <div class="row row-line">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Pickup Address</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->pickup_address }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Drop Address</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->drop_address }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row row-line">--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Driver</span>--}}
{{--                        </label>--}}

{{--                        @if(empty($booking->driver))--}}
{{--                            <p>N/A</p>--}}
{{--                        @else--}}
{{--                            <p>{{ $booking->driver->name }}</p>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Vehicle</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->vehicle->make }} {{ $booking->vehicle->model }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Pickup Date</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->date }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Pickup Time</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->pickup_hour }}:{{ $booking->pickup_min }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row row-line">--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Flight Number</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->flight_number }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Pickup sign</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->pickup_sign }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-2">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Passagers</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->passagers }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-2">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Bags</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->bags }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-2">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Seats</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->seats }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row row-line">--}}
{{--                <div class="col-md-4">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Customer Name</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->name }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Customer Email</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->customer->email }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Customer Phone</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->phone }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row row-line">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Special Requests</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->special_request }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}
{{--                    <div class="info-group">--}}
{{--                        <label class="info-label">--}}
{{--                            <span>Additional Info</span>--}}
{{--                        </label>--}}
{{--                        <p>{{ $booking->additional_info }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="filterable">--}}
{{--        <div class="panel panel-margin">--}}
{{--            <div class="panel-body" style="padding: 0;">--}}
{{--                <div class="mapouter"><div class="gmap_canvas">--}}
{{--                        <iframe width="100%" height="600px" id="gmap_canvas" src="http://maps.google.com/maps?saddr=%{{ $booking->pickup_address }}%22&daddr=%{{ $booking->drop_address }}%22&ie=UTF8&t=h&z=10&layer=t&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>--}}
{{--                        <a href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/"></a>--}}
{{--                    </div>--}}
{{--                    <style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection
