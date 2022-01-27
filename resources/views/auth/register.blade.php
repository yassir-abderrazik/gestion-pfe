@extends('layouts.layout')

@section('content')
<div class="log-content">
    <div class="container-log-content">
        <div class="leftside" style=" background-image: url({{ asset('img/register-wallpaper.jpg') }})">
        </div>
        <div class="rightside p-l-50 p-r-50 p-t-72 p-b-50" style="background-color: #F2F7FA">
            <form  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="log-img">
                    <img class="img-responsive" src="{{ asset('img/fs_logo.png') }}" alt="faculté des sciences">
                </div><br>
                <div class="log-title">Register</div><br>
                <div class="form-podition">
                    {{-- nom --}}
                    <label for="name" class="label-input col-md-7 col-form-label">{{ __('Name') }} :</label>
                    <div class="wrap-input col-md-10">
                        <input id="name" type="text" class="input-form bg-white border border-dark form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- amail --}}
                    <label for="email" class="label-input col-md-7 col-form-label">{{ __('E-Mail Address') }} :</label>
                    <div class="wrap-input col-md-10">
                        <input id="email" type="email"
                            class="input-form bg-white border border-dark form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- password --}}
                    <label for="password" class="label-input col-md-7 col-form-label">{{ __('Password') }} :</label>
                    <div class="wrap-input col-md-10">
                        <input id="password" type="password"
                            class="input-form bg-white border border-dark form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- confirm password --}}
                    <label for="password-confirm"
                        class="label-input col-md-7 col-form-label">{{ __('Confirm Password') }} :</label>
                    <div class="wrap-input col-md-10">
                        <input id="password-confirm" type="password" class="input-form bg-white border border-dark form-control"
                            name="password_confirmation" required autocomplete="new-password">
                    </div><br>
                    {{-- submit --}}
                    <div class="col-md-3  offset-md-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection