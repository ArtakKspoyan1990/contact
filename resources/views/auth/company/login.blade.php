@extends('layouts.dashboard.app')
@push('styles')
    <style type="text/css">
        .logo-picture {
            transition: box-shadow .2s, opacity .2s;
            margin: 0 auto;
            background: #fff;
            transform-origin: center;
            will-change: transform;
            z-index: 2;
            width: 27%;
            padding-top: 27%;
            border-radius: 50%;
            position: relative;
        }


        .logo-picture .logo-picture-img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: scale-down;
            object-position: center center;
            box-shadow: 0 2px 4px 0 rgba(22, 29, 37, .1);
            border-radius: 50%;
        }

    </style>
@endpush
@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="logo-picture" data-image-type="profile">
                                    <img class="logo-picture-img" alt="profile"
                                         src="{{ asset('img/contact/logo.jpg') }}">
                                </div>
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your name and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}" aria-label="Name">
                                            @error('name') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg" aria-label="Password">
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <h1 class="mb-1 text-lg mx-auto">
                                        <a href="javascript:void(0)" class="text-primary text-gradient font-weight-bold">
                                            Contact Us
                                        </a>
                                    </h1>
                                </div>
                                {{--<div class="card-footer text-center pt-0 px-lg-2 px-1">--}}
                                    {{--<p class="mb-1 text-sm mx-auto">--}}
                                        {{--Forgot you password? Reset your password--}}
                                        {{--<a href="{{ route('reset-password') }}" class="text-primary text-gradient font-weight-bold">here</a>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                                {{--<div class="card-footer text-center pt-0 px-lg-2 px-1">--}}
                                    {{--<p class="mb-4 text-sm mx-auto">--}}
                                        {{--Don't have an account?--}}
                                        {{--<a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
              background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
