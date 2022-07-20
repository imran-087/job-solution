@extends('layouts.app')
@section('title', 'Job Category')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <a href="{{ route('job.category') }}">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Job Category</h1>
            </a>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('/home') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Job Sub Category</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row">
            @foreach($sub_categories as $key => $sub_category)
            <div class="col-md-12 card pt-5 me-4 mb-4 pb-0" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                <a href="{{ route('job.category',['category' => $sub_category->id]) }}" class="">
                    <div class="d-flex align-items-center px-3 rounded  mb-7">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-3">
                                <img src="{{ asset('assets') }}/media/avatars/300-5.jpg" class="" alt="">
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="{{ route('job.mcq-question',['sub_category' => $sub_category->id]) }}" class="fw-bolder text-hover-primary mb-3 fs-4 ">{{$sub_category->name}} <span class="badge badge-dark ms-5">Total Question <span class="bg-success text-white px-2 rounded fs-5 fw-bolder"> {{ $sub_category->question_count ?? '0' }} </span></span></a>
                                <div class="d-flex flex-row">
                                @isset($subject_analytics)
                                    @foreach($subject_analytics[$key] as $key => $subject_analytic)
                                        <a href="" ><span class="badge badge-success me-2">{{ $subject_analytic->subject->name }} <span class="bg-light text-danger px-2 rounded fs-6 fw-bolder">{{ $subject_analytic->total }}</span></span></a>
                                    @endforeach
                                @endisset
                                </div>     
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <!--end::Row-->
    </div>
</div>
<!---end::Post -->
@endsection
