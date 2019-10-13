@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base mx-auto">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                    <img src="https://blackhansa.de/images/blackhansa-logo.png">
                </div>
                <div class="title tx-center mg-b-60">Fleet management software</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control @error('email') is-invalid @enderror round" name="email" id="user-name" placeholder="Your Username" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <div class="form-control-position">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </fieldset>

                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control @error('password') is-invalid @enderror round" id="user-password" name="password" placeholder="Enter Password" required="" aria-invalid="false">
                        <div class="form-control-position">
                            <i class="fas fa-key"></i>
                        </div>
                    </fieldset>
                    <div class="form-group row p-b-0 m-b-0">
                        <div class="col-md-6 col-12 text-center text-sm-left">

                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                            <a href="{{ route('register') }}" class="card-link">New User?</a>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection