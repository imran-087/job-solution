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
        <div class="row gy-5 g-xl-8">

            <!--begin::Col-->
            <div class="col-12">
                <!--begin::Tables Widget 5-->
                <div class="card card-xxl-stretch mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">{{  Str::upper(Auth::user()->user_type) }} - <span style="text-transform: capitalize">{{$category->name}}</span> </span>
                            <span class="text-muted mt-1 fw-bold fs-7">More than 700 new questions</span>
                        </h3>
                       
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <div class="tab-content">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                           
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @foreach($sub_categories as $sub_category)
                                            
                                            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                                                <!--begin::Icon-->
                                                <span class="svg-icon svg-icon-success me-5">
                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
                                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <div class="flex-grow-1 me-2">
                                                    <a href="{{ route('jobs.sub-category.subject.all-question', [$category->slug, $sub_category->slug]) }}" class="fw-bolder text-gray-800 text-hover-primary fs-6">{{ $sub_category->name }}</a>
                                                    <span class="text-muted fw-bold d-block">{{ $sub_category->title }}</span>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Lable-->
                                                <span class="fw-bolder  badge badge-circle badge-danger py-1">{{$sub_category->question->count()}}</span>
                                                <!--end::Lable-->
                                            </div>
                                            @endforeach
                                            
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                            
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
            </div>
            <!--end::Col-->
           
        </div>
    </div>
</div>
<!---end::Post -->
@endsection
