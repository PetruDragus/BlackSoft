@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div>
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <div>Edit {{ $city->name }}</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>City Name</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="name" col="4" class="form-input" placeholder="Enter City Name" value="{{ $city->name }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Country</span>
                                    </label>

                                    <input type="text" name="country" class="form-input" placeholder="Enter Country" value="{{ $city->country }}">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Currency</span>
                                    </label>

                                    <select class="form-control select-input" name="currency">
                                        <option value="" disabled="disabled">Select ..</option>
                                        <option value="EURO" >EURO</option>
                                        <option value="us_dollar" >US DOLLAR</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Distance Metric</span>
                                    </label>

                                    <select class="form-control select-input" name="distance_metric">
                                        <option value="" disabled="disabled">Select ..</option>
                                        <option value="km" >KM</option>
                                        <option value="mile" >Mile</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer panel-alt">
                    <div class="flex flex-end">
                        <div>
                            <a href="{{ route('cities.index') }}" class="btn btn-default">
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