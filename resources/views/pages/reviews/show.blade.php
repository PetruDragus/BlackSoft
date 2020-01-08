@extends('layouts.app')

@section('title', 'Trip Details')

@section('content')
    <div id="single--booking">
        <div class="panel panel-margin">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <a href="/reviews" class="router-link-active">Review</a> / #{{ $review->id }} {{ $review->booking->id }}
                        <small>{{ $review->customer_name }}</small>
                    </div>
                </div>
                <div class="panel-extra">
                    <div>
                        <a href="/reviews" class="btn btn-default btn-sm router-link-active">
                            <small class="icon icon-arrow-left-c"></small>
                        </a>
                        <a href="/reviews/1/edit" class="btn btn-default btn-sm">
                            <small class="icon icon-edit"></small>
                        </a>
                        <button type="button" class="btn btn-error btn-sm">
                            <span class="icon icon-trash-b"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="panel-form">
                <div class="row row-line">
                    <div class="col-md-3">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Booking ID</span>
                            </label>
                            <a href="">#{{ $review->booking->id }}</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Driver</span>
                            </label>
                            <p>{{ $review->driver->name }}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Customer</span>
                            </label>
                            <p>{{ $review->customer_name }}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Rating</span>
                            </label>
                            <p>
                                @if($review->rating == '1')
                                    <div style="display: inline-flex;">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                    </div>
                                @elseif($review->rating == '2')
                                    <div style="display: inline-flex;">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                    </div>
                                @elseif($review->rating == '3')
                                    <div style="display: inline-flex;">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                        <i class="far fa-star star-gold"></i>
                                    </div>
                                @elseif($review->rating == '4')
                                    <div style="display: inline-flex;">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-starv"></i>
                                        <i class="far fa-star star-gold"></i>
                                    </div>
                                @elseif($review->rating == '5')
                                    <div style="display: inline-flex;">
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                        <i class="fas fa-star star-gold"></i>
                                    </div>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-md-8">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Review</span>
                            </label>
                            <p>{{ $review->review }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
