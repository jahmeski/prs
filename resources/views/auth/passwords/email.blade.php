@extends('layouts.external') 
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
      </div>
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      <form method="POST" action="{{ route('password.email') }}" class="user">
        @csrf
        <div class="form-group">
          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" name="email"
            value="{{ $email ?? old('email') }}" required autofocus placeholder="Enter Email Address..."> @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
        </div>
        
        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Send Password Reset Link') }}
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