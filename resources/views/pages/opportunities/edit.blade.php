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
                        <div>Edit Opportunity #{{ $opportunity->id }}</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('opportunities.update', $opportunity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Name</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="name" col="4" class="form-input" value="{{ $opportunity->name }}" placeholder="Enter Opportunity Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Phone</span>
                                    </label>

                                    <input type="text" name="phone" class="form-input" value="{{ $opportunity->phone }}" placeholder="Enter Opportunity Phone">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Email</span>
                                    </label>

                                    <input type="email" name="email" class="form-input" value="{{ $opportunity->email }}" placeholder="Enter Contact Email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Location</span>
                                    </label>

                                    <input type="text" name="location" class="form-input" value="{{ $opportunity->location }}" placeholder="Enter Opportunity Location">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Status</span>
                                    </label>

                                    <select class="custom-select" id="modal-status-select" name="category">
                                        <option selected="">Select</option>
                                        <option value="Hot">Hot</option>
                                        <option value="Cold">Cold</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Lost">Lost</option>
                                        <option value="Won">Won</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Logo</span>
                                    </label>

                                    <input type="file" source="input" label="name" name="logo" col="4" class="form-input" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer panel-alt">
                    <div class="flex flex-end">
                        <div>
                            <a href="{{ route('opportunities.index') }}" class="btn btn-default">
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