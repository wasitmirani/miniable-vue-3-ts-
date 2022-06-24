@extends('layouts.backend.authmaster')
@section('content')
<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card">

        <div class="card-body p-4">
            <div class="text-center mt-2">
                <h5 class="text-primary">Welcome Back !</h5>
                <p class="text-muted">Sign in to continue to {{config('app.name')}}.</p>
            </div>
            <div class="mt-2">
                <x-auth-session-status class="mb-4 text-danger" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
        </div>
            <div class="p-2 mt-4">
                <form action="{{route('login')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="username">Username/Email</label>
                        <input type="text"  class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="username" placeholder="Enter username/email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="float-end">
                            <a href="#" class="text-muted">Forgot password?</a>
                        </div>
                        <label class="form-label" for="userpassword">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="auth-remember-check">
                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                    </div>

                    <div class="mt-3 text-end">
                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                    </div>



                    <div class="mt-4 text-center">
                        <div class="signin-other-title">
                            <h5 class="font-size-14 mb-3 title">Sign in with</h5>
                        </div>


                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                                    <i class="mdi mdi-google"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="mt-4 text-center">
                        <p class="mb-0">Don't have an account ? <a href="" class="fw-medium text-primary"> Signup now </a> </p>
                    </div> --}}
                </form>
            </div>

        </div>
    </div>

    <div class="mt-5 text-center">
        <p>© <script>document.write(new Date().getFullYear())</script> Halal CS. Crafted with <i class="mdi mdi-heart text-danger"></i> by Halal CS</p>
    </div>

</div>
@endsection
