@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div>
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <div>New Job Application</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Firstname</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="firstname" col="4" class="form-input" placeholder="Enter Application Firstname">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Lastname</span>
                                    </label>

                                    <input type="text" name="lastname" class="form-input" placeholder="Enter Application Lastname">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Phone</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="phone" col="4" class="form-input" placeholder="Enter Application Phone">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Job</span>
                                    </label>

                                    <select class="form-control select-input" name="job_id">
                                        <option value="" disabled="disabled">Select ..</option>
                                        @foreach($jobs as $row)
                                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Email</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="email" col="4" class="form-input" placeholder="Enter Application Email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Status</span>
                                    </label>

                                    <select class="form-control select-input" name="status">
                                        <option value="" disabled="disabled">Select ..</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer panel-alt">
                    <div class="flex flex-end">
                        <div>
                            <a href="{{ route('contacts.index') }}" class="btn btn-default">
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