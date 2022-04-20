@extends('layouts.app')
@section('title', 'Sub Category')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Category</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Sub Category</li>
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
           
           <div class="col-xl-12 mb-5">
                <!--begin::List widget 23-->
                <div class="card card-flush h-xl-100">
                   
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Items-->
                        {{ $subject->title }}
                        <br>
                        {{$subject->description}}
                        <!--end::Items-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::List widget 23-->
            </div> 
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row">
           
           <div class="col-xl-12">
                <!--begin::List widget 23-->
                <div class="card card-flush h-xl-100">
                   
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Items-->
                        <div class="">
                            @foreach($subject_topics as $topic)
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-5">
                                    <!--begin::Flag-->
                                    <img src="/metronic8/demo1/assets/media/svg/brand-logos/atica.svg" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                    <!--end::Flag-->
                                    <!--begin::Content-->
                                    <div class="me-5">
                                        <!--begin::Title-->
                                        <a href="{{ route('subject.subject-details', $topic->id) }}" class="text-gray-800 fw-bolder text-hover-primary fs-6">{{$topic->name}}</a>
                                        <!--end::Title-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">{{$topic->parentsub->name}}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Info-->
                                    <div class="m-0">
                                        <!--begin::Label-->
                                        <span class="badge badge-success fs-base">
                                        
                                        <!--end::Svg Icon-->{{$topic->question->count()}}</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            @endforeach
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::List widget 23-->
            </div> 
        </div>
        <!--end::Row-->
        
        
    </div>
</div>
<!---end::Post -->
@endsection
