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
                    <li class="breadcrumb-item text-muted">Samprotik Question</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Create</li>
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
                            <div>
                                <label class="required fs-6 fw-bold mb-2">Select Main Category</label>
                                <select class="form-select form-select-solid main_category" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select main category"  name="main_category" >
                                    <option value=""></option>
                                    @foreach ($main_categories as $main_category)
                                        <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder mb-2 text-dark">Categories</span>
                            </h3>
                            
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Timeline-->
                            <div class="timeline-label mb-5">
                                {{-- @foreach($data as $category)
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Label-->
                                    <div class="timeline-label fw-normal text-muted text-gray-800 fs-6 ">{{$category->main_category->name}}</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-warning fs-1"></i>
                                    </div>
                                    <!--end::Badge-->
                                    
                                    <!--begin::Text-->
                                    <div class="fw-bolder timeline-content cursor-pointer ps-3 border p-3 rounded getsubCategory" data-id="{{ $category->id }}" data-main_cat="{{$category->main_category->id}}">
                                        {{$category->name}}  
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                                @endforeach --}}
                                <!--begin::Categories-->
                                <!--begin::render category-->    
                                <div id="category">
                                
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
                    <div id="sub_category">
                    
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
    // Get Category 
    $('.main_category').on('change', function () {
        var id = $(this).val();
        if (id) {
            $.ajax({
                url: '/admin/question/mcq-question/categories/' + id,
                type: "GET",
                dataType: "json",
                success: function (data) {

                    $('#category').html('');
                    $("#category").html(data.html); 
                }
                    
            });
        }
    });

    //render sub category
    $(document).on('click', '.getsubCategory', function(){
        var id = $(this).data('id');
        var main_cat = $(this).data('main_cat');
        $.ajax({
             type:"GET",
                url: "{{ url('admin/question/mcq-question/sub-categories')}}",
                data:{
                    id: id,
                    main_category : main_cat
                },
                dataType: 'json',
                success:function(data){
                    $('#sub_category').html('');
                    $("#sub_category").html(data.html); 
                }
        })
    })
 
});
</script>

<script type="text/javascript">

    //show description form
    $(document).on('click', '.add-description', function(){
        $(this).closest('div').find('.des-form').toggleClass('d-none');
    })

    //add description
    $(document).on('submit', '#kk_add_description_form', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')
        $('#kk_modal_new_service_submit').attr('disabled','true')
        var thisadd = $(this);
        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('admin/description/question-description/store')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.success ==  false || data.success ==  "false"){
                    var arr = Object.keys(data.errors);
                    var arr_val = Object.values(data.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(data.error || data.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                    $('#kk_modal_new_question_form').find('.messages').html(alertBox).show();
                }else{
                    toastr.success(data.message);
                    thisadd.parent().parent("div").find('.des-form').addClass('d-none');
                    
                }

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')
            }
        });
    })

</script>
@endpush


