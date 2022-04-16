@extends('layouts.app')
@section('title', 'Profile')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User Dashboard</h1>
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
                <li class="breadcrumb-item text-dark">Profile</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Profile Overview</li>
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
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
        <!--begin::Overview-->
        @include('user.dashboard_header')
        <!--end::Overview-->
        
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-15">
                <!--begin::Classic content-->
                <div class="mb-13">
                    <!--begin::Intro-->
                    <div class="mb-15">
                        <!--begin::Title-->
                        <h4 class="fs-2x text-gray-800 w-bolder mb-6">Description Details</h4>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <p class="fw-bold fs-4 text-gray-600 mb-2">added by <span style="color:tomato">{{ Auth::user()->name }}</span></p>
                        <!--end::Text-->
                    </div>
                    <!--end::Intro-->
                    <!--begin::Row-->
                    <div class="row mb-12">
                        @foreach($descriptions as $description)
                        <!--begin::Col-->
                        <div class="col-md-6 pe-md-10 mb-10 mb-md-0">
                            <!--begin::Accordion-->
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Heading-->
                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_{{ $description->id}}">
                                    <!--begin::Icon-->
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                        <span class="svg-icon toggle-off svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{$description->question->question}}? <span class="badge {{ $description->status == 'approve' ? 'badge-success' : 'badge-light'}} {{ $description->status == 'reject' ? 'badge-danger' : 'badge-light'}}  float-right">{{ $description->status }}</span></h4>
                                    <!--end::Title-->
                                    
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div id="kt_job_4_1_{{ $description->id}}" class="collapse fs-6 ms-1">
                                    <!--begin::Text-->
                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">{{ $description->description }}
                                        <br>
                                        @if($description->status == 'reject')
                                        <span class="btn btn-sm btn-primary resubmit" data-id="{{ $description->id }}">Resubmit</span>
                                        @endif
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed"></div>
                                <!--end::Separator-->
                            </div>
                            <!--end::Section-->
                           
                            <!--end::Accordion-->
                        </div>
                        <!--end::Col-->
                        @endforeach
                        <!--begin::Col-->
                        {{-- <div class="col-md-6 ps-md-10">
                            <!--begin::Title-->
                            <h2 class="text-gray-800 fw-bolder mb-4">Installation</h2>
                            <!--end::Title-->
                            <!--begin::Accordion-->
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Heading-->
                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_1">
                                    <!--begin::Icon-->
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                        <span class="svg-icon toggle-off svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">What platforms are compatible?</h4>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div id="kt_job_5_1" class="collapse show fs-6 ms-1">
                                    <!--begin::Text-->
                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed"></div>
                                <!--end::Separator-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Heading-->
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_2">
                                    <!--begin::Icon-->
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                        <span class="svg-icon toggle-off svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">How many people can it support?</h4>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div id="kt_job_5_2" class="collapse fs-6 ms-1">
                                    <!--begin::Text-->
                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed"></div>
                                <!--end::Separator-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Heading-->
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_3">
                                    <!--begin::Icon-->
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                        <span class="svg-icon toggle-off svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">How long is the warrianty?</h4>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div id="kt_job_5_3" class="collapse fs-6 ms-1">
                                    <!--begin::Text-->
                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed"></div>
                                <!--end::Separator-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Section-->
                            <div class="m-0">
                                <!--begin::Heading-->
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_4">
                                    <!--begin::Icon-->
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                        <span class="svg-icon toggle-off svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">How fast is the installation?</h4>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Body-->
                                <div id="kt_job_5_4" class="collapse fs-6 ms-1">
                                    <!--begin::Text-->
                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Section-->
                            <!--end::Accordion-->
                        </div> --}}
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    
                </div>
                <!--end::Classic content-->
                
            </div>
            <!--end::Body-->
        </div>
        
        
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->

<!--begin::Modal - New Product/Service-->
<div class="modal fade" id="kk_modal_new_question_des" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kk_modal_new_question_des_form" class="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    @csrf
                    <input type="hidden" name="question_des_id">

                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Update Question Description</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                   
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Question</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select main category" name="question" id="question">
                                
                            </select>
                            <div class="help-block with-errors question-error"></div>
                        </div>
                        
                    </div>
                    <!--end::Input group-->
                    
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Descrption</span>
                        </label>
                        <!--end::Label-->
                        <textarea name="description" class="form-control form-control-solid h-100px"></textarea>
                        <div class="help-block with-errors description-error"></div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Product/Service-->


@endsection

@push('script')
<script type="text/javascript">
//edit description modal
       $('.resubmit').on('click', function(){
           var id = $(this).data(id)
            $.ajax({
                type:"GET",
                url: "{{ url('description/question-des/get')}}"+'/'+id.id,
                dataType: 'json',
                success:function(data){
                    $('textarea[name="description"]').val(data.question_des.description)
                    $('input[name="question_id"]').append('<option value="' + data.question.id + '">' + data.question.question + '</option>');
                    $("#kk_modal_new_question_des").modal('show');
                }
          });
        })

        //cancel button
        $('#kk_modal_new_service_cancel').on('click', function(){
            $('#kk_modal_new_question_des_form')[0].reset();
            $("#kk_modal_new_question_des").modal('hide');
        })

        //new descrption save
        $('#kk_modal_new_question_des_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('description/question-description/store')}}",
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
                        $('#kk_modal_new_question_des_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_question_des_form')[0].reset();
                        $("#kk_modal_new_question_des").modal('hide');

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

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
          });

        })
</script>
@endpush


