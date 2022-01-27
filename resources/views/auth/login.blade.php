@extends('layouts.layout')

@section('content')
<div class="log-content">
    <div class="container-log-content">
        <div class="leftside" style=" background-image: url({{ asset('img/login-wallpaper.jpg') }})"></div>
        <div class="rightside p-l-50 p-r-50 p-t-72 p-b-50" style="background-color: #F2F7FA">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="log-img">
                    <img class="img-responsive" src="{{ asset('img/fs_logo.png') }}" alt="faculté des sciences">
                </div><br><br>
                <div class="log-title">Login</div><br>
                <div class="form-podition">

                    {{-- email --}}
                    <label for="name" class="label-input col-md-7 col-form-label">{{ __('E-Mail Address') }} :</label>
                    <div class="wrap-input col-md-10">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    {{-- password --}}
                    <label for="email" class="label-input col-md-7 col-form-label">{{ __('Password') }} :</label>
                    <div class="wrap-input col-md-10">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>


                    {{-- password --}}
                    <div class="wrap-input col-md-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div><br>



                    {{-- submit --}}
                    <div class="wrap-input col-md-10">

                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection