@extends('layouts.front')

@section('content')
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
                <span class="breadcrumb-item active">Print Admission Slip</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Print your admission slip</h4>
{{--            <p class="mg-b-0">Applicants who submit more than one application form or use one receipt for more than one set forms will be disqualified </p>--}}
        </div>


        <div class="br-pagebody">
            <div class="br-section-wrapper ">

                <!-- form-layout -->
                <h3 class="text-center">Coming</h3>
            </div>
        </div>
    </div>
@endsection
