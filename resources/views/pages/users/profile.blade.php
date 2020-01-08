@extends('layouts.app')

@section('content')
    <div class="m-t-10">
        <div class="row nav nav-tabs" id="nav-tab" role="tablist">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="widget__media">
                                <img src="/storage/{{ $profile->filename }}" alt="image">
                            </div>
                            <div class="widget__content">
                                <div class="widget__section">
                                    <a href="#" class="widget__username">
                                        {{ $profile->name }}
                                        <i class="fas fa-certificate font-success"></i>
                                    </a>
                                    <span class="widget__subtitle">
                                        CEO & Founder
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="widget__content">
                            <div class="widget__info">
                                <span class="widget__label">Email:</span>
                                <a href="#" class="idget__data">{{ Auth::user()->email }}</a>
                            </div>
                            <div class="widget__info">
                                <span class="widget__label">Phone:</span>
                                <a href="#" class="widget__data">{{ $profile->phone }}</a>
                            </div>
                            <div class="widget__info">
                                <span class="widget__label">Location:</span>
                                <span class="widget__data">{{ $profile->city }}, {{ $profile->country }}</span>
                            </div>
                            <div class="widget__info">
                                <span class="widget__label">Address:</span>
                                <span class="widget__data">{{ $profile->address }}</span>
                            </div>
                        </div>

                        <div class="widget__items">

                            <a class="widget__item widget__item widget__item--active" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-account" aria-selected="true">
                                <span class="widget__section">
                                    <i class="far fa-user-circle"></i>

                                    <span class="widget__desc">
                                        Account Information
                                    </span>
                                </span>
                            </a>

                            <a class="widget__item widget__item" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="true">
                                <span class="widget__section">
                                    <i class="fas fa-passport"></i>

                                    <span class="widget__desc">
                                        Change Password
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active card" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                        <div class="card-header">
                            <div class="portlet__head-label">
                                <h3 class="portlet__head-title">Personal Information <small>update your personal information</small></h3>
                            </div>
                        </div>

                        <form class="form form--label-right" action="{{ route('profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="card-body">
                                <div class="portlet__body">
                                    <div class="section section--first">
                                        <div class="section__body">
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="section__title section__title-sm">Customer Info:</h3>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar avatar--outline" >
                                                        <div class="avatar__holder" style="background-image: url(/storage/{{ $profile->filename }})"></div>
                                                        <label class="avatar__upload" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                        </label>
                                                        <span class="avatar__cancel"  title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Name</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="name" value="{{ $profile->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">City</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-city"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="city" value="{{ $profile->city }}" placeholder="City" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Country</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-globe"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="country" value="{{ $profile->country }}" placeholder="Country" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="section__title section__title-sm">Contact Info:</h3>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Contact Phone</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}" placeholder="Phone" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Address</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="address" value="{{ $profile->address }}" placeholder="Address" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Email Address</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-at"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" class="form-control" name="email" value="{{ $profile->email }}" placeholder="Email Address" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <button type="submit" class="btn btn-success">Submit</button>&nbsp;
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show card" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                        <div class="card-header">
                            <div class="portlet__head-label">
                                <h3 class="portlet__head-title">Change Password <small>change or reset your account password</small></h3>
                            </div>
                        </div>

                        <form class="form form--label-right" method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="card-body">
                                    <div class="portlet__body">
                                        <div class="section section--first">
                                            <div class="section__body">
                                                <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                                                    <div class="alert-icon">
                                                        <i class="fa fa-exclamation-triangle"></i>
                                                    </div>
                                                    <div class="alert-text">Configure user passwords to expire periodically. Users will need warning that their passwords are going to expire, <br>or they might inadvertently get locked out of the system!</div>
                                                    <div class="alert-close">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">
                                                                <i class="la la-close"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="section__title section__title-sm">Change Or Recover Your Password:</h3>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Current Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="current-password" name="current-password" placeholder="Current Password" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">New Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="password" name="password" placeholder="New Password" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label justify-content-end">Verify Password</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Verify Password" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3 col-xl-3">
                                    </div>
                                    <div class="col-lg-9 col-xl-9">
                                        <button type="reset" class="btn btn-success">Change Password</button>&nbsp;
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection