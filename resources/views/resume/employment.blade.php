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
                <!--begin::Accordion-->
                <div class="accordion" id="kt_accordion_1">

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                Employment History
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                <form id="kk_employment_history_form" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-13">
                                        <!--begin::Title-->
                                        <h1 class="mb-3 text-muted fs-3">Add Experience</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                   
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Company Name</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter company name"
                                                    name="company_name" />
                                                <div class="help-block with-errors company_name-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Company Business</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Company business"
                                                    name="company_business" />
                                                <div class="help-block with-errors company_business-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Designation</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your designation"
                                                    name="designation" />
                                                <div class="help-block with-errors designation-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Department</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter your department"
                                                    name="department" />
                                                <div class="help-block with-errors department-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row mb-2">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Employment Period</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-solid" placeholder="Joining date"
                                                    name="start_date" />
                                                    <span>start date</span>
                                                <div class="help-block with-errors start_date-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--end::Input group-->
                                            <input class="form-check-input me-2" type="checkbox" value="" id="currently_working" >Currently Working
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required"></span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-solid" placeholder="End date"
                                                    name="end_date" />
                                                    <span>End date</span>
                                                <div class="help-block with-errors end_date-error"></div>
                                            </div>
                                           
                                        </div>
                                       
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Responsibilities </span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid h-100px" placeholder="Enter your job responsibity" name="responsibilities"></textarea>
                                        <div class="help-block with-errors responsibilities-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Area of Expertise</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Your expertise"
                                                    name="expertise" />
                                                <div class="help-block with-errors expertise-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-2 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required"></span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input group-->
                                                <div class="input-group mb-5">
                                                    <input type="text" class="form-control" placeholder="Time period" name="duration" value=""/>
                                                    <span class="input-group-text">Months</span>
                                                    <div class="help-block with-errors month-error"></div>
                                                </div>
                                               
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row mb-5">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Location\Address</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text"  class="form-control form-control-solid" placeholder="Enter company address" name="address">
                                        <div class="help-block with-errors address-error"></div>   
                                    </div>
                                    <!-- end: col-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_employment_history_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_employment_history_submit" class="btn btn-primary">
                                            <span class="indicator-label py-3 px-7">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-8" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_2">
                            <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_5" aria-expanded="false" aria-controls="kt_accordion_1_body_5">
                                Employment History (For Retired Army Person)
                            </button>
                        </h2>
                        <div id="kt_accordion_1_body_5" class="accordion-collapse collapse " aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                            <div class="accordion-body">
                                <!--begin:Form-->
                                {{-- <form id="kk_modal_new_sub_category_form" class="form" enctype="multipart/form-data">
                                    <div class="messages"></div>
                                    <!--begin::Heading-->
                                    <div class="mb-5">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5 mb-5 required">Training</div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Training Title </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter title"
                                                    name="training_title" />
                                                <div class="help-block with-errors training_title-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="">Country</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Achievement"
                                                    name="country" />
                                                <div class="help-block with-errors country-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Topics Covered</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Topic Covered"
                                                    name="topic_covered" />
                                                <div class="help-block with-errors topic_covered-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-bold mb-2">Training year</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select" name="training_year">
                                                <option value="1999">1999</option>
                                                <option value="2020" >2020</option>
                                                
                                            </select>
                                            <div class="help-block with-errors training-error"></div>    
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                     <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Institute</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Institute"
                                                    name="institute" />
                                                <div class="help-block with-errors institute-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Duration</span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Achievement"
                                                    name="country" />
                                                <div class="help-block with-errors country-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                     <!--begin::Input group-->
                                    <div class="row g-9 mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Location/Address </span>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter address"
                                                    name="address" />
                                                <div class="help-block with-errors address-error"></div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                           
                                        </div>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" id="kk_modal_new_sub_category_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                                            <span class="indicator-label py-3 px-7">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Accordion-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection

@push('script')
    <script type="text/javascript">

    //save employment history
    $('#kk_employment_history_form').on('submit',function(e){
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
            url: "{{ url('/resume/step_03/employment-history/store')}}",
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