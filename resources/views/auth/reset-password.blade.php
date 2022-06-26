{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
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
            <h5 class="text-primary">Update Password</h5>
            <p class="text-muted">.</p>
        </div>
        <div class="p-2 mt-4">
                    <!-- Validation Errors -->
            <x-auth-validation-errors class="alert alert-danger  mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <label class="form-label" for="useremail">Email</label>
                    <input type="email" name="email" class="form-control" id="useremail" value="{{old('email', $request->email)}}" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="useremail">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="useremail">Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter password_confirmation">
                </div>
                <div class="mt-3 text-end">
                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Reset Password</button>
                </div>



            </form>
        </div>

    </div>
</div>
</div>


@endsection
