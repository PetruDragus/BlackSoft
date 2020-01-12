@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div>
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

        @include('partials._alert')

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <div>Edit Driver</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('drivers.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Full Name</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="name" col="4" class="form-input" placeholder="Full Name" value="{{ $driver->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Address</span>
                                    </label>

                                    <input type="text" name="address" class="form-input" placeholder="Address" value="{{ $driver->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Email</span>
                                    </label>

                                    <input type="email" name="email" class="form-input" placeholder="Email" value="{{ $driver->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Vehicle</span>
                                    </label>

                                    <select name="vehicle_id" class="form-control select-input">
                                        <option value="" disabled="disabled">Select ..</option>
                                        @foreach($vehicle as $item)
                                            <option value="{{ $item->id }}">{{ $item->make }} {{ $item->model }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>City</span>
                                    </label>

                                    <input type="text" name="city" class="form-input" placeholder="City" value="{{ $driver->city }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Phone</span>
                                    </label>

                                    <input type="text" source="input" name="phone" class="form-input" placeholder="Phone Number" value="{{ $driver->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Birthday</span>
                                    </label>

                                    <input type="date" source="input" name="birthday" class="form-input" placeholder="Phone Number" value="{{ $driver->birthday }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Genter</span>
                                    </label>

                                    <select name="genter" class="form-control select-input">
                                        <option value="" disabled="disabled">Select ..</option>
                                        <option value="Male" @if($driver->genter == 'Male') selected @endif>Male</option>
                                        <option value="Female" @if($driver->genter == 'Female') selected @endif>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Driver Photo</span>
                                    </label>

                                    <input type="file" name="photo" accept=".png, .jpg, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>GPS Card</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="gps_card" col="4" class="form-input" value="{{ $driver->gps_card }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Fuel Card</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="fuel_card" col="4" class="form-input"  value="{{ $driver->fuel_card }}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-line">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Status</span>
                                    </label>

                                    <select name="status" class="form-control select-input">
                                        <option value="" disabled="disabled">Select ..</option>
                                        <option value="Active" @if ($driver->status === 'Active') selected @endif>Active</option>
                                        <option value="Inactive" @if ($driver->status === 'Inactive') selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer panel-alt">
                    <div class="flex mx-auto">
                        <div>
                            <a href="{{ route('drivers.index') }}" class="btn btn-default">
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