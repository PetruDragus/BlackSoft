@extends('layouts.app')

@section('title', 'Trip Details')

@section('content')
    <div id="single--booking">
        <div class="panel panel-margin">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <a href="/contact-form" class="router-link-active">Contact Form</a> / #{{ $contactForm->id }}
                        <small>{{ $contactForm->name }}</small>
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
                    <div class="col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Name</span>
                            </label>
                            <p>{{ $contactForm->name }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Email</span>
                            </label>
                            <p>{{ $contactForm->email }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Subject</span>
                            </label>
                            <p>{{ $contactForm->subject }}</p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-md-8">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Review</span>
                            </label>
                            <p>{{ $contactForm->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
