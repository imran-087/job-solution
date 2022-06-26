@extends('admin.layout.app')
@section('title', 'Samprotik-Question')

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
                    <li class="breadcrumb-item text-muted">Academy Question</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">List</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                {{-- <a href="{{ route('admin.question.all-question') }}" class="btn btn-sm btn-light btn-active-primary me-2">MCQ</a>
                <a href="{{ route('admin.question.image-question') }}" class="btn btn-sm btn-light btn-active-primary me-2">IMAGE MCQ</a>
                <a href="{{ route('admin.question.passage-question') }}" class="btn btn-sm btn-light btn-active-primary">PASSAGE MCQ</a> --}}
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid col-12"  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row">
                <!--begin::Categories-->
                <div class="col-md-4">
                    <!--begin::List Widget 5-->
                    <div class="card card-xl-stretch">
                        <!--begin::Header-->
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder mb-2 text-muted">Academy</span>
                            </h3>
                           
                            <label class="required fs-6 fw-bold mb-2">Select </label>
                            <select class="form-select form-select-solid category" data-control="select2" data-hide-search="true"
                                name="category" >
                                @foreach ($data as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors main_category-error"></div>
                            
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Timeline-->
                            <div class="timeline-label mb-5">
                                
                                <!--begin::Categories-->
                                <!--begin::render category-->    
                                <div id="sub_category">
                                
                                </div>
                                <!--end::Categories-->
                            </div>
                            <!--end::Timeline-->
                        </div>
                        <!--end: Card Body-->
                    
                    </div>
                    <!--end: List Widget 5-->
                </div>
                <!--end::Categories-->

                <!--begin::SubCategories-->
                <div class="col-md-7">
                    <!--begin::render sub ccategory-->    
                    <div id="subject">
                    
                    </div>
                </div>
                <!--end::SubCategories-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection

@push('script')

<script>
$(document).ready(function(){

    //send a request on page load
    $(document).ready(function() {
        $(".category").trigger('change');
    });

    

    // Get sub Category 
    $('.category').on('change', function () {
        var id = $(this).val();
        if (id) {
            $.ajax({
                url: '/admin/academy/sub-categories/' + id,
                type: "GET",
                dataType: "json",
                success: function (data) {

                    $('#sub_category').html('');
                    $("#sub_category").html(data.html); 
                }
                    
            });
        }
    });

    //send a request on page load
    $(document).ready(function() {
        $(document).find('.getsubject').first().trigger('click');
    });
    
    //render subject
    $(document).on('click', '.getsubject', function(){
        var id = $(this).data('id');
        $.ajax({
             type:"GET",
                url: "{{ url('admin/academy/class/subject')}}" + "/" + id,
                dataType: 'json',
                success:function(data){
                    $('#subject').html('');
                    $("#subject").html(data.html); 
                }
        })
    })
 
});
</script>


@endpush


