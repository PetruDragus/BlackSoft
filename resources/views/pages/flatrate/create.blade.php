@extends('layouts.app')

@section('title', 'Flat Rate')

@section('content')
    <div>
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <div>New Flat Rate</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('flat-rates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Pickup Address</span>
                                    </label>

                                    <input id="pickup-address" type="text" source="input" label="name" name="pickup_address" col="4" class="form-input" placeholder="Enter Pickup Address">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Drop Address</span>
                                    </label>

                                    <input id="dropoff-address" type="text" source="input" label="name" name="drop_address" col="4" class="form-input" placeholder="Enter Drop Address">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Active</span>
                                    </label>

                                    <select class="form-control select-input" name="active">
                                        <option value="" disabled="disabled">Select ..</option>
                                            <option value="1">Yes</option>
                                            <option value="0">Not</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer panel-alt">
                    <div class="flex flex-end">
                        <div>
                            <a href="{{ route('flat-rates.index') }}" class="btn btn-default">
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