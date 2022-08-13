@extends('layouts.backend.authmaster')
@section('title')
    Audit Survey
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-5">
                            <div class="maintenance-img">
                                <img src="{{asset('assets/images/exp.png')}}" alt="" class="img-fluid mx-auto d-block">
                            </div>
                            <div class="text-center">
                                <h1 class="mt-5">Your audit dates has been expired</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
