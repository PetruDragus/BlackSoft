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
                    <div>Create Role & Permissions</div>
                </div>
            </div>
        </div>

        <form class="form" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="panel-form add__user--form">
                <div class="container-fluid">

                    <div class="row-line">
                        <div class="form-group row mx-auto">
                            <label class="col-md-4 label-control">Role Name</label>
                            <div class="col-md-6">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row-line">
                        <div class="form-group row mx-auto">
                            <label class="col-md-4 label-control">Permission</label>
                            <div class="col-md-6">
                                @foreach($permission as $value)
                                    <label style="text-align: left !important;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer panel-alt">
                <div class="flex mx-auto">
                    <div>
                        <a href="{{ route('roles.index') }}" class="btn btn-default">
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
