@extends('layouts.app')

@section('content')
<div class="" style="height: 100%;">
    <div class="row justify-content-center" style="height: 100%; margin: 0px;">
        <div class="col-md-6" style="display: flex; align-items: center;">
            <form method="POST" action="{{ route('login') }}" style="width: 100%;">
                @csrf

                <div class="form-group row" style="margin-right: 0px; margin-left: 0px;">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row" style="margin-right: 0px; margin-left: 0px;">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row" style="margin-right: 0px; margin-left: 0px;">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0" style="margin-right: 0px; margin-left: 0px;">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary" style="background: red; border-color: red;">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6" style="display: flex; justify-content: center; align-items: center; background: linear-gradient(135deg, #4c5988 5%, #255aab 95%); flex-direction: column; color: white;">
            <h3>Hello,friend!</h3>
            <br>
            <h5>Enter your personal details and start journey</h5>
            <a class="nav-link" href="{{ route('register') }}">
                <button style="width: 80px; height: 40px; border-radius: 10px; background: #53bdee; border-color: #53bdee;">{{ __('Register') }}</button>
            </a>
        </div>
    </div>
</div>
@endsection
