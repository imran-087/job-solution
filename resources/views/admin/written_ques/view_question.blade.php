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
                                        <h4 class="text-black mb-5">Exam Name</h4>
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
                    <div class="card">
                    <!--begin::Body-->
                        <div class="card-body p-lg-15">
                            <div class="flex-lg-row-fluid">
                                <!--begin::Extended content-->
                                <div class="mb-13">
                                    <!--begin::Content-->
                                    <div class="mb-15 text-center">
                                        <!--begin::Title-->
                                        <h4 class="fs-2x text-gray-800 w-bolder mb-2">{{ $exam_detail->name }}</h4>
                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <p class="fw-bold fs-4 text-gray-600 mb-2">{{ $exam_detail->title ?? 'Bangladesh Civil Service Exam' }}</p>
                                        <!--end::Text-->
                                        <!--begin::Text-->
                                        <p class="fw-bold fs-4 text-gray-600 mb-2">বিষয় কোড ঃ ১০১ </p>
                                        <!--end::Text-->
                                        <!--begin::Text-->
                                        <p class="fw-bold fs-4 text-gray-600 mb-2">নির্ধারিত সময় ঃ ২ ঘণ্টা</p>
                                        <!--end::Text--> 
                                        <!--begin::Text-->
                                        <p class="fw-bold fs-4 text-gray-600 mb-2">পূর্ণমান ঃ ২০০</p>
                                        <!--end::Text--> 
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Item-->
                                    @if($questions->count() > 0)
                                   
                                    <div class="mb-5">
                                       
                                        @foreach($questions as $parent_question)
                                            <!--begin::Title-->
                                            <div class="m-0" style="margin-left:20px !important">
                                               
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible collapsed  py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_1_{{$parent_question->id}}">
                                                    @if($parent_question->question_instruction == 0)
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
                                                    @endif
                                                    <!--begin::Title-->
                                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $parent_question->question_no }} | {{ $parent_question->question }}</h4>
                                                    <a href="javascript:;" data-id="{{ $parent_question->id }}" data-type="{{$parent_question->question_instruction}}" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                                    <!--end::Title-->

                                                </div>
                                                <!--end::Heading-->
                                                @if($parent_question->question_instruction == 0)
                                                <!--begin::Body-->
                                                <div id="kt_job_8_1_{{$parent_question->id}}" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10"><b>উত্তর:</b> &nbsp; {{ $parent_question->answer->answer ?? '' }}</div>
                                                    <!--end::Text-->
                                                    @foreach ($parent_question->descriptions as $description)
                                                    <!--begin::description-->
                                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10 text-center " style="text-align: justify"><b>Description:</b> &nbsp; {{ $description->description ?? '' }} <span class="d-flex justify-content-end cursor-pointer edit-Description" data-id="{{ $description->id }}" data-description="{{ $description->description }}" ><i class="fas fa-edit"></i></span></div>
                                                    
                                                    <!--end::description-->
                                                    @endforeach
                                                    
                                                    <button class="btn btn-sm btn-light  mb-4 addDescription" data-id="{{ $parent_question->id }}"> Add Description</button>
                                                </div>
                                                @endif
                                                <!--end::Content-->
                                                @if($parent_question->question_or == null)
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                                @else
                                                    @if($parent_question->question_or) 
                                                    <span><b class="text-uppercase" style="font: 800; font-weight:bold; margin-left:35px">{{ $parent_question->question_or }}</b></span>
                                                    @endif
                                                @endif

                                            </div>
                                            <!--end::Section-->
                                            @foreach($parent_question->children as $child_question)
                                                <div class="m-0" style="margin-left:40px !important">

                                                    <!--begin::Heading-->
                                                    <div class="d-flex align-items-center collapsible collapsed  py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_1_{{$child_question->id}}">
                                                        @if($child_question->question_instruction !== 1)
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
                                                        @endif
                                                        <!--begin::Title-->
                                                        <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $child_question->question_no }} | {{ $child_question->question }}</h4>
                                                        <a href="javascript:;" data-id="{{ $child_question->id }}" data-type="{{ $child_question->question_instruction }}" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                                        <!--end::Title-->

                                                    </div>
                                                    <!--end::Heading-->
                                                    @if($child_question->question_instruction == 0)
                                                    <!--begin::Body-->
                                                    <div id="kt_job_8_1_{{$child_question->id}}" class="collapse fs-6 ms-1">
                                                        <!--begin::Text-->
                                                        <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10"><b>উত্তর:</b> &nbsp; {{ $child_question->answer->answer ?? '' }}</div>
                                                        <!--end::Text-->
                                                        @foreach ($child_question->descriptions as $description)
                                                        <!--begin::description-->
                                                        <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10 text-center" style="text-align: justify"><b>Description:</b> &nbsp; {{ $description->description ?? '' }} <span class="d-flex justify-content-end cursor-pointer edit-Description" data-id="{{ $description->id }}" data-description="{{ $description->description }}" ><i class="fas fa-edit"></i></span></div>
                                                        <!--end::description-->
                                                        @endforeach
                                                       <button class="btn btn-sm btn-light btn-hover-color-primary  mb-4 addDescription" data-id="{{ $child_question->id }}"> Add Description</button>
                                                    </div>
                                                    @endif
                                                    <!--end::Content-->
                                                    @if($child_question->question_or == null)
                                                    <!--begin::Separator-->
                                                    <div class="separator separator-dashed"></div>
                                                    <!--end::Separator-->
                                                    @else
                                                    @if($child_question->question_or)
                                                    <span><b class="text-uppercase" style="font: 800; font-weight:bold; margin-left:35px">{{ $child_question->question_or }}</b></span>
                                                    @endif
                                                    @endif

                                                </div>

                                                @foreach($child_question->children as $grand_child_question)
                                                <div class="m-0" style="margin-left:60px !important">

                                                    <!--begin::Heading-->
                                                    <div class="d-flex align-items-center collapsible py-3 toggle mb-0 collapsed " data-bs-toggle="collapse" data-bs-target="#kt_job_8_1_{{$grand_child_question->id}}">

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
                                                        <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $grand_child_question->question_no }} | {{ $grand_child_question->question }}</h4>
                                                        <a href="javascript:;" data-id="{{ $grand_child_question->id }}" data-type="{{ $grand_child_question->question_instruction }}" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                                        <!--end::Title-->

                                                    </div>
                                                    <!--end::Heading-->
                                                    {{-- @endif --}}
                                                    <!--begin::Body-->
                                                    <div id="kt_job_8_1_{{$grand_child_question->id}}" class="collapse fs-6 ms-1">
                                                        <!--begin::Text-->
                                                        <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10"><b>উত্তর:</b> &nbsp; {{ $grand_child_question->answer->answer ?? '' }}</div>
                                                        <!--end::Text-->
                                                        @foreach ($grand_child_question->descriptions as $description)
                                                        <!--begin::description-->
                                                        <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10" style="text-align: justify"><b>Description:</b> &nbsp; {{ $description->description ?? '' }} <span class="d-flex justify-content-end cursor-pointer edit-Description" data-id="{{ $description->id }}" data-description="{{ $description->description }}" ><i class="fas fa-edit"></i></span></div>
                                                        <!--end::description-->
                                                        @endforeach
                                                        <button class="btn btn-sm btn-light btn-hover-color-primary mb-4 addDescription" data-id="{{ $grand_child_question->id }}"> Add Description</button>
                                                    </div>

                                                    <!--end::Content-->
                                                    @if($grand_child_question->question_or == null)
                                                    <!--begin::Separator-->
                                                    <div class="separator separator-dashed"></div>
                                                    <!--end::Separator-->
                                                    @else
                                                    @if($grand_child_question->question_or)
                                                    <span><b class="text-uppercase" style="font: 800; font-weight:bold; margin-left:35px">{{ $grand_child_question->question_or }}</b></span>
                                                    @endif
                                                    @endif

                                                </div>
                                                @endforeach

                                            @endforeach
                                           
                                        @endforeach
                                        
                                    </div>
                                    @endif
                                    <!--end::Item-->
                                </div>
                                <!--end::Extended content-->
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

<!--begin::Modal - Edit Question view modal-->
<div class="modal fade" id="kk_modal_edit" tabindex="-1" aria-hidden="true">
<div id="edit_modal"></div>
</div>
<!--end::Modal - Edit Question view modal-->

<!--begin::Modal - New Description add form-->
<div class="modal fade" id="kk_modal_new_description" tabindex="-1" aria-hidden="true">
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
                <form id="kk_modal_new_description_form" class="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    @csrf
                    <input type="hidden" name="question_id">
                    <input type="hidden" name="description_id">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Add Description</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Description</span>
                        </label>
                        <!--end::Label-->
                        <textarea type="text" class="form-control form-control-solid h-150px" placeholder="Write description here ........"
                            name="description" id="textarea" ></textarea>
                        <div class="help-block with-errors description-error"></div>
                    </div>
                    <!--end::Input group-->
                   
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3 ">Cancel</button>
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
<!--end::Modal - New Description add form-->

@endsection

@push('script')
<script type="text/javascript">
    //Edit
    $(document).ready(function(){
        $('.edit').on('click', function(){
            var id = $(this).data('id');
            var type = $(this).data('type');
            console.log(type)
            console.log(id)
            $.ajax({
                type:"GET",
                url: "{{ url('admin/question/written-question/edit')}}"+'/'+id+'/'+type,
                dataType: 'json',
                success:function(data){
                    $("#edit_modal").html(data.html);
                    $("#kk_modal_edit").modal('show');
                }
            });
        });

        //cancel
        $(document).on('click', '.cancel', function(){
            $('#kk_modal_new_edit_question_form')[0].reset();
            $("#kk_modal_edit").modal('hide');
        })

        //update
        $(document).on('submit', '#kk_modal_new_edit_question_form', function(e){
            e.preventDefault()
            //console.log('here')
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('admin/question/written-question/update')}}",
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
                        $('#kk_modal_new_edit_question_form')[0].reset();
                        $("#kk_modal_edit").modal('hide');
                        location.reload();
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
            });
        })
    })

    //Description
    $(document).ready(function(){
        $('.addDescription').on('click', function(){
            var id = $(this).data('id');
            console.log(id)
            $('input[name="question_id"]').val(id)
            $('.with-errors').text('')
            $('#kk_modal_new_description_form')[0].reset();
            $('#kk_modal_new_description').modal('show')
        });

        //cancel
        $('#kk_modal_new_service_cancel').on('click',  function(){
            $('#kk_modal_new_description_form')[0].reset();
            $("#kk_modal_new_description").modal('hide');
        })

        //save description
        $(document).on('submit', '#kk_modal_new_description_form', function(e){
            e.preventDefault()
            //console.log('here')
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('admin/written-question/description/store')}}",
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
                        $('#kk_modal_new_description_form')[0].reset();
                        $("#kk_modal_new_description").modal('hide');
                        location.reload();
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_service_submit').removeAttr('disabled')
                }
            });
        })

        $('.edit-Description').on('click', function(){
            var id = $(this).data('id');
            var description = $(this).data('description');
            // console.log(id)
            // console.log(description)
            $('input[name="description_id"]').val(id);
            $('#textarea').val(description);
            $('.with-errors').text('');
            $('#kk_modal_new_description').modal('show');
        });
    })
</script>
@endpush