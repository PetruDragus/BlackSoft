@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <div>
                    <div>Create Booking</div>
                </div>
            </div>
        </div>

        <form class="form" action="{{ route('bookings.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="panel-form">
                <div>
                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Pickup Address</span>
                                </label>

                                <input id="pickup-address" type="text" source="input" label="name" name="pickup_address" col="4" class="form-input" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Drop Address</span>
                                </label>

                                <input id="dropoff-address" type="text" source="input" label="name" name="drop_address" col="4" class="form-input" >
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Driver</span>
                                </label>

                                <select name="driver_id" class="form-control select-input">
                                    <option value="" disabled="disabled">Select ..</option>
                                    @foreach($driver as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Vehicle</span>
                                </label>

                                <select class="form-control select-input">
                                    <option value="" disabled="disabled">Select ..</option>
                                    @foreach($vehicle as $item)
                                        <option value="{{ $item->id }}">{{ $item->make }} {{ $item->make }} / € {{ $item->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Date</span>
                                </label>

                                <input type="date" source="input" label="name" name="date" col="4" class="form-input" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Pickup time</span>
                                </label>

                                <input type="text" source="input" label="name" name="pickup_time" col="4" class="form-input" >
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Flight Number</span>
                                </label>

                                <input type="text" source="input" label="name" name="flight_number" col="4" class="form-input">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Pickup Sign</span>
                                </label>

                                <input type="text" source="input" label="name" name="pickup_sign" col="4" class="form-input">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Passagers</span>
                                </label>

                                <select class="form-control select-input" name="passagers">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Seats</span>
                                </label>

                                <select class="form-control select-input" name="seats">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Bags</span>
                                </label>

                                <select class="form-control select-input" name="bags">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Customer Name</span>
                                </label>

                                <input type="text" source="input" label="name" name="name" col="4" class="form-input">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Customer Email</span>
                                </label>

                                <input type="text" source="input" label="name" name="email" col="4" class="form-input" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Customer Phone</span>
                                </label>

                                <input type="text" source="input" label="name" name="phone" col="4" class="form-input" >
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Special Requests</span>
                                </label>

                                <textarea type="text" name="special_request" rows="4" cols="50" class="form-input" style="height:100px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Additional Info</span>
                                </label>

                                <textarea type="text" name="additional_info" rows="4" cols="50" class="form-input" style="height:100px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Status <i class="fas fa-info-circle"></i></span>
                                </label>

                                <select name="status" class="form-control select-input">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="Pending" >Pending</option>
                                    <option value="Cancelled" >Cancelled</option>
                                    <option value="Finished" >Finished</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel-footer panel-alt">
                <div class="flex flex-end">
                    <div>
                        <a href="{{ route('bookings.index') }}" class="btn btn-default">
                            <span class="btn-text">Cancel</span>
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <span class="btn-text">Save</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
