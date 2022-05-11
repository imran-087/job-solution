@extends('admin.layout.app')
@section('title', 'Written-Question')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Question</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Written Question</li>
                    <!--end::Item-->
                   
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid col-12  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row gy-5 g-xl-8">
                <div class="col-md-4">
                    <!--begin::FAQ card-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-15">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-lg-row">
                                <!--begin::Sidebar-->
                                <div class="flex-column flex-lg-row-auto w-100 w-lg-275px mb-10 me-lg-20">
                                   
                                    <!--begin::Catigories-->
                                    <div class="mb-15">
                                        <h4 class="text-black mb-5">Sub Category</h4>
                                        <!--begin::Menu-->
                                        <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-bold">
                                            @foreach($sub_categories as $sub_category)
                                            <!--begin::Item-->
                                            <div class="menu-item mb-3">
                                                <!--begin::Link-->
                                                <a class="menu-link py-3 active" href="{{ route('admin.written.show', ['sub_category'=> $sub_category->sub_category_id]) }}">{{$sub_category->sub_category->name}}</a>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Item-->
                                            @endforeach
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Catigories-->
                                    
                                </div>
                                <!--end::Sidebar-->
                                
                            </div>
                            <!--end::Layout-->
                            
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::FAQ card-->
                </div>

                @if($load == 'true')
                <div class="col-md-8">
                    <!--begin::Feeds Widget 2-->
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body-header text-center py-4 px-4">
                            <h3>{{ $details->name }}</h3>
                            <h5>{{ $details->title }}</h5>
                        </div>
                        @foreach($instructions as $instruction)
                        <div >
                            <p style="margin-left: 10px !important">{{ $instruction->instruction_no }} &nbsp; {{ $instruction->instruction }}</p>
                        </div>
                            @foreach($instruction->questions as $question)
                            <!--begin::Body-->
                            <div class="card-body pb-0">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <p>{{ $question->question_no }}.  &nbsp; {{ $question->question }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p> answer:  &nbsp; {{ $question->answer }}</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--end::Body-->
                            @endforeach
                        @endforeach
                    </div>
                    <!--end::Feeds Widget 2-->
                </div>  
                @endif 
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


@endsection
