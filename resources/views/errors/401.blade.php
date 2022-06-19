@extends('errors::layout')

@section('title')
{{ __('UnAuthorized') }}
@endsection
@section('content')
<div class="col-md-12">
    <div class="text-center">
        <div>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <div class="error-img">
                        <img src="{{asset('assets/images/not-authorized.svg')}}" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>
        </div>
        <h4 class="text-uppercase mt-4">Sorry, You are not authorized! 🔐</h4>
        <p class="text-muted">USR account credentials to access the web pages it serves.</p>
        <div class="mt-5">
            <a class="btn btn-primary waves-effect waves-light" href="{{url('/portal/dashboard')}}">Back to Dashboard</a>
        </div>
    </div>

</div>
@endsection
