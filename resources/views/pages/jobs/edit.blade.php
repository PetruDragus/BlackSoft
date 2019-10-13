@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div>

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div>
                        <div>Edit Job</div>
                    </div>
                </div>
            </div>

            <form class="form" action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="panel-form">
                    <div>
                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Title</span>
                                    </label>

                                    <input type="text" source="input" label="name" name="title" col="4" class="form-input" placeholder="Enter Job Title" value="{{ $job->title }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Vacancy</span>
                                    </label>

                                    <input type="text" name="vacancy" class="form-input" placeholder="Enter Job Vacancy"value="{{ $job->vacancy }}">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Expiry Date</span>
                                    </label>

                                    <input type="date" name="last_date" class="form-input" placeholder="Enter Expiry Date" value="{{ $job->date }}">
                                </div>
                            </div>
                        </div>

                        <div class="row row-line">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        <span>Description</span>
                                    </label>

                                    <textarea type="text" name="description" rows="4" cols="50" class="form-input" style="height:100px;">
{{ $job->description }}
                                    </textarea>
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