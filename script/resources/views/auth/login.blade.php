@extends('layouts.frontend.app')

@section('title','Login')

@section('content')


<!-- main area start -->
<section>
    <div class="login-area pt-200 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-section">
                        <div class="card login-title">
                            <center><h4 class="card-header" style="background: rgb(230, 201, 173);">{{ __('Log in') }}</h4></center>
                            <div class="card-body login-form">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <p>{{ __('Email or Username') }}</p>
                                    <div class="login-form-gorup">
                                        <input type="text" id="email" class="login-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email or Username') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <p>{{ __('Password') }}</p>
                                    <div class="login-form-gorup">
                                        <input type="password" id="password" class="login-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                    </div>
                                    <div class="login-form-group">
                                        <div class="custom-login-remember-forgotten">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                <p>{{ __('Remember Me') }}</p>
                                            </label>
                                            @if (Route::has('password.request'))
                                            <a class="pjax f-right" href="{{ route('password.request') }}">
                                                <p>{{ __('Forgot Your Password?') }}</p>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="login-form-button">
                                        <button type="submit">{{ __('Login') }}</button>
                                    </div>
                                    <div class="login-form-group not-registered text-center">
                                        <p>{{ __('Not registered?') }}<a class="pjax" href="{{ route('register') }}">{{ __('Create a account') }}</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main area end -->
@endsection
