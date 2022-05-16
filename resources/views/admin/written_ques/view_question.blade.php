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
                                    @if($parent_instructions->count() > 0)
                                    <div class="mb-5">
                                        @foreach($parent_instructions as $parent_instruction)
                                            <!--begin::Title-->
                                            <span class="d-flex">
                                            <h3 class="text-gray-800 w-bolder mb-4 mt-7">{{ $parent_instruction->parent_instruction_no }} &nbsp; {{ $parent_instruction->parent_instruction }}</h3>
                                            <a href="javascript:;" data-id="{{ $parent_instruction->id }}" data-type="parent_instruction" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                            </span>
                                            <!--end::Title-->
                                            <!--begin::Accordion-->
                                            @foreach($parent_instruction->written_questions as $question)
                                            <!--begin::Section-->
                                            <div class="m-0" style="margin-left:20px !important">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_1_{{$question->id}}">
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
                                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $question->question_no }} &nbsp; {{ $question->question }}</h4>
                                                    <a href="javascript:;" data-id="{{ $question->id }}" data-type="question" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                                    
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_8_1_{{$question->id}}" class="collapse fs-6 ms-1">
                                                    <!--begin::Text-->
                                                    <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">answer: &nbsp; {{ $question->answer }}</div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Content-->
                                                @if($question->question_or == null)
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                                @else
                                                    @if($question->question_or) 
                                                    <span><b class="text-uppercase" style="font: 800; font-weight:bold; margin-left:35px">{{ $question->question_or }}</b></span>
                                                    @endif
                                                @endif

                                            </div>
                                            <!--end::Section-->
                                            @endforeach
                                            <!--end::Accordion-->

                                            <!--begin::Accordion-->
                                            @if($parent_instruction->question_instruction->count() > 0)
                                            @foreach($parent_instruction->question_instruction as $instruction)
                                            <!--begin::Section-->
                                            <div class="m-0" style="margin-left:20px !important">
                                                <!--begin::Heading-->
                                                <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_1_ins_{{$instruction->id}}">
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
                                                    <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $instruction->instruction_no }} &nbsp; {{ $instruction->instruction }}</h4>
                                                    <a href="javascript:;" data-id="{{ $instruction->id }}" data-type="instruction" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>

                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Body-->
                                                <div id="kt_job_8_1_ins_{{$instruction->id}}" class="collapse fs-6 ms-1">
                                                    @php
                                                        $instruction_questions = App\Models\WrittenQuestion::where(['sub_category_id' => $instruction->sub_category_id, 'question_instruction_id' => $instruction->id])->get();
                                                    @endphp
                                                    @foreach($instruction_questions as $ins_question)
                                                    <!--begin::Section-->
                                                    <div class="m-0" style="margin-left:40px !important">
                                                        <!--begin::Heading-->
                                                        <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_1_ins_q{{$ins_question->id}}">
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
                                                            <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $ins_question->question_no }} &nbsp; {{ $ins_question->question }}</h4>
                                                            <a href="javascript:;" data-id="{{ $ins_question->id }}" data-type="question" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Body-->
                                                        <div id="kt_job_8_1_ins_q{{$ins_question->id}}" class="collapse fs-6 ms-1">
                                                            <!--begin::Text-->
                                                            <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">answer: &nbsp; {{ $ins_question->answer }}</div>
                                                            <!--end::Text-->
                                                        </div>
                                                        <!--end::Content-->
                                                        <!--begin::Separator-->
                                                        <div class="separator separator-dashed"></div>
                                                        <!--end::Separator-->
                                                        
                                                    </div>
                                                    <!--end::Section-->
                                                    @endforeach
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-dashed"></div>
                                                <!--end::Separator-->
                                                
                                            </div>
                                            <!--end::Section-->
                                            @endforeach
                                            @endif
                                            <!--end::Accordion-->
        
                                        @endforeach
                                        
                                    </div>
                                    @endif
                                    <!--end::Item-->
                                    
                                    @if($without_parent_questions->count() > 0)
                                    @foreach($without_parent_questions as $without_parent_question)
                                    <!--begin::Item-->
                                    <div class="mb-0">
                                        <!--begin::Accordion-->
                                        <!--begin::Section-->
                                        <div class="m-0">
                                            <!--begin::Heading-->
                                            <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_10_1_{{ $without_parent_question->id }}">
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
                                                <h3 class="text-gray-800 w-bolder cursor-pointer mb-0">{{ $without_parent_question->question_no }} &nbsp; {{ $without_parent_question->question }}</h3>
                                                <a href="javascript:;" data-id="{{ $without_parent_question->id }}" data-type="question" class="btn btn-sm btn-icon" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>

                                                <!--end::Title-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Body-->
                                            <div id="kt_job_10_1_{{ $without_parent_question->id }}" class="collapse fs-6 ms-1">
                                                <!--begin::Text-->
                                                <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">answer: &nbsp; {{ $without_parent_question->answer }}</div>
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
                                    <!--end::Item-->
                                    @endforeach
                                    @endif
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

@endsection

@push('script')
<script type="text/javascript">
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
</script>
@endpush