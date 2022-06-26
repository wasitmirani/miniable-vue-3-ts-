{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.backend.authmaster')

@section('content')

<div class="col-md-8 col-lg-6 col-xl-5">
<div class="card">

    <div class="card-body p-4">

        <div class="text-center mt-2">
            <h5 class="text-primary">Reset Password</h5>
            <p class="text-muted">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>
        <hr>
        <x-auth-session-status class="alert alert-success text-center mb-4 mt-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger  mb-4" :errors="$errors" />
        <div class="p-2 mt-4">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf


                <div class="mb-3">
                    <label class="form-label" for="useremail">Email</label>
                    <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">
                </div>

                <div class="mt-3 text-end">
                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Reset</button>
                </div>


                <div class="mt-4 text-center">
                    <p class="mb-0">Remember It ? <a href="{{route('login')}}" class="fw-medium text-primary"> Signin </a></p>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
@endsection
