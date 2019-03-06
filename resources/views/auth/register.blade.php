@extends('layouts.external')

@section('content')
<div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form method="POST" action="{{ route('register') }}" class="user">
              @csrf
              <div class="form-group">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-user" placeholder="Full Name" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" placeholder="Email Address" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-user" placeholder="Password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                </button>
             
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
            </div>
            <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
            </div>
          </div>
        </div>
@endsection
