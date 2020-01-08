@extends('layouts.app')

@section('title', 'New Review')

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
                    <div>Create User</div>
                </div>
            </div>
        </div>

        <form class="form" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="panel-form add__user--form">
                <div class="container-fluid">

                    <div class="row-line">
                        <div class="form-group row mx-auto">
                            <label class="col-md-4 label-control" for="projectinput5">Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="User name" name="name">
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row-line">
                        <div class="form-group row mx-auto">
                            <label class="col-md-4 label-control">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="User Email" name="email" >
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row-line">
                        <div class="form-group row mx-auto">
                            <label class="col-md-4 label-control" for="projectinput5">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="user-password" class="form-control" placeholder="User Password" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="row-line">
                        <div class="form-group row mx-auto">
                            <label class="col-md-4 label-control" for="projectinput5">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" id="user-password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel-footer panel-alt">
                <div class="flex mx-auto">
                    <div>
                        <a href="{{ route('users.index') }}" class="btn btn-default">
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
