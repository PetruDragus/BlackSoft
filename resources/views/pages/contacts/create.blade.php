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
                    <div>New Contact</div>
                </div>
            </div>
        </div>

        <form class="form" action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-form">
                <div>
                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Name</span>
                                </label>

                                <input type="text" source="input" label="name" name="name" col="4" class="form-input" placeholder="Enter Contact Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Email</span>
                                </label>

                                <input type="email" name="email" class="form-input" placeholder="Enter Contact Email">
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Phone</span>
                                </label>

                                <input type="text" name="phone" class="form-input" placeholder="Enter Contact Phone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Address</span>
                                </label>

                                <input type="text" name="address" class="form-input" placeholder="Enter Contact Address">
                            </div>
                        </div>
                    </div>

                    <div class="row row-line">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Notes</span>
                                </label>

                                <textarea type="text" name="notes" rows="4" cols="50" class="form-input" style="height:100px;"></textarea>
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