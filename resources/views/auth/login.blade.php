@extends('layouts.nonav')

@section('nonav-content')
@include('inc.message')
<div id="login-form" class="container form">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="login-title text-sm text-uppercase">
                Đăng nhập
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class=" col-form-label text-md-start">{{ __('Email Address') }}</label>

                            <div class="input-wrapper text-sm-center">
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class=" col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="input-wrapper text-sm-center ">
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn-link text-xs mt-1 px-0" href="{{ route('password.request') }}">
                                    {{ __('Quên Mật Khẩu?') }}
                                </a>
                            @endif
                        </div>

                        <div class="row mb-3">
                            <div class="">
                                <div class="d-flex flex-row align-items-center">
                                    <input class="f-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="" for="remember">
                                        {{ __('Nhớ Đăng Nhập') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-flex flex-row align-items-center">
                                <button type="submit" class="btn btn-primary text-nowrap text-capitalize">
                                    {{ __('Đăng nhập') }}
                                </button>
                                <button class="btn btn-default ml-2 text-nowrap"><a href="/register" class="signin text-capitalize">
                                    {{ __('Đăng ký') }}
                                </a></button>

                                
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
