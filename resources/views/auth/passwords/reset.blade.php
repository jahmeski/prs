@extends('layouts.external')

@section('content')
<div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
              <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="user">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Enter Email Address...">

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
                        {{ __('Reset Password') }}
                    </button>
              </a>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="{{ route('register') }}">Create an Account!</a>
            </div>
            <div class="text-center">
              <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
@endsection
