@extends('layouts.external')

@section('content')

<div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
            <form method="POST" action="{{ route('register') }}" class="user">
                    @csrf
              <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" name="email" value="{{ old('email') }}" placeholder="Enter Email Address..." required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="form-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-user" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox small">
                  <input class="custom-control-input" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }} >
                  <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Login') }}
                </button>
            </form>
            <hr>
            <div class="text-center">
                @if (Route::has('password.request'))
                    <a class="small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
              
            </div>
            <div class="text-center">
              <a class="small" href="{{ route('register') }}">Create an Account!</a>
            </div>
          </div>
        </div>
      </div>

@endsection
