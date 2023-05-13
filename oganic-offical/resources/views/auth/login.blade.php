
@extends('layouts.access')
@section('title')
    <title>Ogani | Sign In</title>
@endsection
@section('title-panner')
    Sign In
@endsection
@section('form')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group mb-lg">
            <label>Email</label>
            <div class="input-group input-group-icon">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="input-group-addon">
                    <span class="icon icon-lg">
                        <i class="fa fa-user"></i>
                    </span>
                </span>
            </div>
            @error('email')
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </div>
            @enderror
        </div>

        <div class="form-group mb-lg">
            <div class="clearfix">
                <label class="pull-left">Password</label>
                @if (Route::has('password.request'))
                    <a class="pull-right">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="input-group input-group-icon">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span class="input-group-addon">
                    <span class="icon icon-lg">
                        <i class="fa fa-lock"></i>
                    </span>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="checkbox-custom checkbox-default">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
            <span>or</span>
        </span>

        <div class="row mb-2">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-primary btn-block btn-lg" value="{{ __('Sign In') }}">
            </div>
        </div>

        <div class="row">
            <p class="text-center p-3">Don't have an account yet? 
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Sign Up!') }}</a>
                @endif
            </p>
        </div>
    </form>
@endsection