@extends('layouts.app')

@section('title', 'Resume')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User</h1>
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
                <li class="breadcrumb-item text-dark">Resume</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Resume Management</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
            
        </div>
        <!--end::Page title-->
         <div class="d-flex align-items-center gap-2 gap-lg-3">
            @guest
            <!--begin::Primary button-->
            <a href="{{ route('login') }}" class="btn btn-sm btn-primary" id="readingMode" >Login</a>
            <!--end::Primary button-->
            @endguest
        </div>
    
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">

        @include('resume.menubar')

        <div class="card mb-9">
            <div class="card-body">
                <div class="row mb-5">
                    <!--begin:Form-->
                    <form id="kk_photograph_form" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="messages"></div>
                        <!--begin::Col-->
                        <div class="col-lg-12 text-center">
                            <div class="fs-6 fw-bold mt-2 mb-8">Upload your photo</div>
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/metronic8/demo1/assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('/metronic8/demo1/assets/media/svg/brand-logos/volicity-9.svg')"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text mb-9">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-center">
                                <button type="reset" id="kk_modal_new_sub_category_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                                    <span class="indicator-label py-3 px-7">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Col-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection

@push('script')
    <script type="text/javascript">

    //savespecialization skill
    $('#kk_photograph_form').on('submit',function(e){
        e.preventDefault();
        //alert('ok');
        // $('.with-errors').text('');
        // $('.indicator-label').hide();
        // $('.indicator-progress').show();
        // $('#kk_address_detail_submit').attr('disabled','true');

        var formData = new FormData(this);
        //console.log(formData);
        $.ajax({
            type:"POST",
            url: "{{ url('/resume/step_05/photograph/store')}}",
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
                    $('#kk_modal_new_sub_category_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_sub_category_form')[0].reset();
                    clearAppendData();
                    $("#kk_modal_new_sub_category").modal('hide');

                    Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Ok, got it!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function () {
                            //refresh datatable
                            $('#dataTable').DataTable().ajax.reload();
                        }))
                }

            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('#kk_address_detail_submit').removeAttr('disabled');

            }
        });

    })
    </script>
@endpush