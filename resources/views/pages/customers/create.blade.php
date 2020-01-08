@extends('layouts.app')

@section('content')
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

    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <div>
                    <div>New Driver</div>
                </div>
            </div>
        </div>

        <form class="form" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-form">
                <div>
                    <div class="row row-line">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Name</span>
                                </label>

                                <input type="text" source="input" label="name" name="name" col="4" class="form-input" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Phone</span>
                                </label>

                                <input type="text" source="input" label="name" name="phone" col="4" class="form-input" placeholder="Phone number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">
                                    <span>Email</span>
                                </label>

                                <input type="email" name="email" class="form-input" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer panel-alt">
                <div class="flex flex-end">
                    <div>
                        <a href="{{ route('customers.index') }}" class="btn btn-default">
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
