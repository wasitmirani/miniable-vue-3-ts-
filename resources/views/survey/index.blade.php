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
                            <div class="text-center">
                                <h5>Hello, {{$audit_auditor->auditor->name}}</h5>
                                <p class="text-muted">Audit Survey</p>

                                <div>
                                    <button type="button" class="btn btn-primary mt-2 me-2 waves-effect waves-light">Email
                                        Us</button>
                                    {{-- <button type="button" class="btn btn-success mt-2 waves-effect waves-light">Send us a
                                        tweet</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-xl-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h3><strong>{{$audit->title}}</strong></h3>

                                        <div class="clearfix"></div>
                                        <h5 class="mt-3 mb-1">{{$audit->created_at}}</h5>
                                        <p class="text-muted">Status: <span
                                                class="badge rounded-pill bg-primary">{{$audit->status->name}}</span></p>

                                    </div>
                                    <hr class="my-4">
                                    <div class="text-muted">
                                        <h5 class="font-size-16"><strong> Description:</strong></h5>
                                        <p>{{$audit->description}}</p>
                                        <div class="table-responsive mt-4">
                                            <!-- <div>

                            </div> -->
                                            <div class="mt-1">
                                                <h5 class="font-size-16"><strong> Mobile:</strong></h5>
                                                <h5 class="font-size-16">{{$audit->phone}}</h5>
                                            </div>
                                            <!-- <div class="mt-4">
                                <p class="mb-1">Email :</p>
                                <h5 class="font-size-16">marcus@minible.com</h5>
                            </div> -->
                                            <div class="mt-1">
                                                <h5 class="font-size-16"><strong> Location:</strong></h5>
                                                <h5 class="font-size-16">{{$audit->location}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div id="faqs-accordion" class="custom-accordion mt-5 mt-xl-0">
                                <div class="card border shadow-none">
                                    <a href="#faqs-gen-ques-collapse" class="text-dark" data-bs-toggle="collapse"
                                        aria-haspopup="true" aria-expanded="true" aria-controls="faqs-gen-ques-collapse">
                                        <div class="bg-light p-3">

                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle font-size-22">
                                                            <i class="uil uil-question-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Audit Dates</h5>
                                                    <p class="text-muted text-truncate mb-0">Audit Dates</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-16"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <div id="faqs-gen-ques-collapse" class="collapse show" data-bs-parent="#faqs-accordion">
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Please mark availability date</h5>

                                                    <form method="POST" class="row row-cols-lg-auto gx-3 gy-4 align-items-center" action="{{route('audit-survery-auditor',['token'=>request('token')])}}">
                                                    @csrf
                                                            @foreach ($audit->auditdates as $item)
                                                            <div>
                                                                <div class="form-check form-check-right">
                                                                    <input name="available_dates[]" class="form-check-input" type="checkbox" id="formCheckRight{{$item->id}}" value="{{$item->id}}">
                                                                    <label class="form-check-label" for="formCheckRight{{$item->id}}">
                                                                       {{ $item->audit_date->format('d-m-Y') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="hstack gap-1">
                                                            <div class="vr"></div>
                                                            </div>
                                                            @endforeach
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>


                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border shadow-none">
                                    <a href="#faqs-privacy-policy-collapse" class="text-dark collapsed"
                                        data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false"
                                        aria-controls="faqs-privacy-policy-collapse">
                                        <div class="bg-light p-3">

                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle font-size-22">
                                                            <i class="uil uil-shield-check"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Approved Auditors</h5>
                                                    <p class="text-muted text-truncate mb-0">Approved Auditors List</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-16"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                    <div id="faqs-privacy-policy-collapse" class="collapse"
                                        data-bs-parent="#faqs-accordion">
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="d-flex align-items-start mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-xs">
                                                                    <div
                                                                        class="avatar-title rounded-circle bg-soft-primary text-primary font-size-22">
                                                                        <i class="uil uil-question-circle"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-16 mt-1">Where can I get some ?</h5>
                                                                <p class="text-muted">If several languages coalesce, the
                                                                    grammar of the resulting language is more simple</p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex align-items-start mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-xs">
                                                                    <div
                                                                        class="avatar-title rounded-circle bg-soft-primary text-primary font-size-22">
                                                                        <i class="uil uil-question-circle"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-16 mt-1">Why do we use it ?</h5>
                                                                <p class="text-muted">Their separate existence is a myth.
                                                                    For science, music, sport, etc, Europe uses the same
                                                                    vocabulary. </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="d-flex align-items-start mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-xs">
                                                                    <div
                                                                        class="avatar-title rounded-circle bg-soft-primary text-primary font-size-22">
                                                                        <i class="uil uil-question-circle"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-16 mt-1">Where does it come from ?
                                                                </h5>
                                                                <p class="text-muted">Everyone realizes why a new common
                                                                    language would be desirable one could refuse to pay
                                                                    expensive translators.</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border shadow-none">
                                    <a href="#faqs-pricing-plans-collapse" class="text-dark collapsed"
                                        data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false"
                                        aria-controls="faqs-pricing-plans-collapse">
                                        <div class="bg-light p-3">

                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle font-size-22">
                                                            <i class="uil uil-user-check"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Audit Auditors</h5>
                                                    <p class="text-muted text-truncate mb-0">Audit Auditors List</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-16"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                    <div id="faqs-pricing-plans-collapse" class="collapse"
                                        data-bs-parent="#faqs-accordion">
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="d-flex align-items-start mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-xs">
                                                                    <div
                                                                        class="avatar-title rounded-circle bg-soft-primary text-primary font-size-22">
                                                                        <i class="uil uil-question-circle"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-16 mt-1">Where does it come from ?
                                                                </h5>
                                                                <p class="text-muted">Everyone realizes why a new common
                                                                    language would be desirable one could refuse to pay
                                                                    expensive translators.</p>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex align-items-start mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-xs">
                                                                    <div
                                                                        class="avatar-title rounded-circle bg-soft-primary text-primary font-size-22">
                                                                        <i class="uil uil-question-circle"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-16 mt-1">What is Lorem Ipsum ?</h5>
                                                                <p class="text-muted">If several languages coalesce, the
                                                                    grammar of the resulting language is more simple</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="d-flex align-items-start mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-xs">
                                                                    <div
                                                                        class="avatar-title rounded-circle bg-soft-primary text-primary font-size-22">
                                                                        <i class="uil uil-question-circle"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-16 mt-1">Why do we use it ?</h5>
                                                                <p class="text-muted">Their separate existence is a myth.
                                                                    For science, music, sport, etc, Europe uses the same
                                                                    vocabulary. </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
