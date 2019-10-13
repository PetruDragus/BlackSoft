@extends('layouts.app')

@section('title', 'Trip Details')

@section('content')
    <div id="single--booking">
        <div class="panel panel-margin">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <a href="/jobs" class="router-link-active">Job</a> / #{{ $job->id }}
                        <small>{{ $job->title }}</small>
                    </div>
                </div>
                <div class="panel-extra">
                    <div>
                        <a href="/jobs" class="btn btn-default btn-sm router-link-active">
                            <small class="icon icon-arrow-left-c"></small>
                        </a>
                        <a href="/jobs/1/edit" class="btn btn-default btn-sm">
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
                                <span>Title</span>
                            </label>
                            <a href="">{{ $job->title}}</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Vacancy</span>
                            </label>
                            <p>{{ $job->vacancy }}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Expiry Date</span>
                            </label>
                            <p>{{ $job->last_date }}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Status</span>
                            </label>
                            <p>
                                 <span class="status @if($job->status == 'Active') status-green @else status-pink @endif">
                                    <span class="status-text">{{ $job->status }}</span>
                                 </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row row-line">
                    <div class="col-md-8">
                        <div class="info-group">
                            <label class="info-label">
                                <span>Description</span>
                            </label>
                            <p>{{ $job->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
