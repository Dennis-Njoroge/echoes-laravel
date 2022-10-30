@php
    $title = 'Login';
@endphp
@extends('layouts.main_login')

@section('content')
    <div class="container mt-5" >
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card opacity-75 " style="border-radius: 20px;">
                    <div class="card-header bg-transparent mt-2 border-0 "><h3 class="text-center text-justify">{{ __('ECHOES') }}</h3></div>
                    <div class="card-body">
                        <div class="text-center ">
                            <h6 class="text-muted mb-3">{{__('Sign in to start your session.')}}</h6>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                                    <div class="input-group-append "><div class="input-group-text bg-theme"><span class="fas fa-envelope"></span></div></div>
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                    <div class="input-group-append ">
                                        <div class="input-group-text bg-theme">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-success btn-block btn-sm">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                            </div>
                            <div class="form-group mb-3  mt-2">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-block btn-default" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-transparent text-center border-0">
                        <span class="text-info">Copyright &copy; {{date('Y')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
