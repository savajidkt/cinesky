@extends('layouts.app')
@section('page_title', 'Forgot Password')
@section('content')
<main class="login-bg">
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 d-flex flex-column align-items-center justify-content-center">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-5">
                                            @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                            @endif
                                            <form class="row g-3 needs-validation p-3" method="POST" action="{{ route('forgot-password') }}">
                                                @csrf
                                                <h1 class="card-title pt-0 pb-0 mb-0">{{ __('Reset Password') }}</h1>
                                                <div class="col-12">
                                                    <div class="input-group has-validation">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  placeholder="{{ __('Email Address') }}">
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                               
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100" type="submit">{{ __('Send Password Reset Link') }}</button>
                                                </div>
                                                <div class="col-12">
                                                <a href="{{route('login')}}" class="logo d-flex align-items-center w-auto">
                                                    <button class="btn btn-primary w-100" type="button">{{ __('Login') }}</button>
                                                </a>

                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <a href="{{ route('login') }}" class="logo d-flex align-items-center w-auto">
                                                            <img src="{{asset('front/assets/img/logo.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6 login-form-img"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection