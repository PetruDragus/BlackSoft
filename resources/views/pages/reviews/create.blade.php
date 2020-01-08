@extends('layouts.app')

@section('title', 'New Review')

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
                    <div>Create Review</div>
                </div>
            </div>
        </div>

        <form class="form" action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="panel-form">
                <div>
                    <div class="row row-line">
                        <div class="col-md-6">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Booking</span>
                                </label>

                                <select name="booking_id" class="form-control select-input">
                                    <option value="" disabled="disabled">Select ..</option>
                                    @foreach($booking as $item)
                                        <option value="{{ $item->id }}">#{{ $item->id }} | {{ $item->pickup_address }} | {{ $item->date }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Customer</span>
                                </label>

                                <input type="text" source="input" label="name" name="customer_name" col="4" class="form-input" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Rating</span>
                                </label>

                                <select class="form-control select-input" name="rating">
                                    <option value="" disabled="disabled">Select ..</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Review <i class="fas fa-info-circle"></i></span>
                                </label>

                                <textarea type="text" name="review" rows="4" cols="50" class="form-input" style="height:100px;"></textarea>
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
