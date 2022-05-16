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
                            <h3>{{ $exam_detail->name }}</h3>
                            <h5>{{ $exam_detail->title ?? 'BCs Exam' }}</h5>
                        </div>
                        @if($parent_instructions->count() > 0)
                        @foreach($parent_instructions as $parent_instruction)
                        <div class="d-flex justify-content-between">
                            
                            <p style="margin-left: 15px !important">{{ $parent_instruction->parent_instruction_no }} &nbsp; {{ $parent_instruction->parent_instruction }}</p>
       
                        </div>
                            
                            @foreach($parent_instruction->written_questions as $question)
                            <div class="ml-4 ">
                                <span class="d-flex justify-content-between">
                                    <p style="margin-left: 30px !important">{{ $question->question_no }} &nbsp; {{ $question->question }}</p>
                                    <a href="javascript:;" data-id="{{ $question->id }}" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                </span>
                               
                                <p style="margin-left: 30px !important">answer: &nbsp; {{ $question->answer }}</p>
                            </div>
                            @endforeach
                            @if($parent_instruction->question_instruction->count() > 0)
                            @foreach($parent_instruction->question_instruction as $instruction)
                            <div class="ml-4">
                                <p style="margin-left: 30px !important">{{ $instruction->instruction_no }} &nbsp; {{ $instruction->instruction }}</p>
                                @php
                                    $instruction_questions = App\Models\WrittenQuestion::where(['sub_category_id' => $instruction->sub_category_id, 'question_instruction_id' => $instruction->id])->get();
                                @endphp
                                @foreach($instruction_questions as $ins_question)
                                <div>
                                    <span class="d-flex justify-content-between">
                                        <p style="margin-left: 60px !important">{{ $ins_question->question_no }} &nbsp; {{ $ins_question->question }}</p>
                                        <a href="javascript:;" data-id="{{ $ins_question->id }}" class="btn btn-sm btn-icon edit" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                                    </span>
                                    
                                    <p style="margin-left: 60px !important">answer: &nbsp; {{ $ins_question->answer }}</p>
                                </div>
                                
                                @endforeach
                            </div>
                            @endforeach
                            @endif
                        @endforeach
                        @endif

                        @if($without_parent_questions->count() > 0)
                        @foreach($without_parent_questions as $without_parent_question)
                        <div>
                            <span class="d-flex justify-content-between">
                                <p style="margin-left: 15px !important">{{ $without_parent_question->question_no }} &nbsp; {{ $without_parent_question->question }}</p>
                                <a href="javascript:;" data-id="{{ $without_parent_question->id }}" class="btn btn-sm btn-icon" style="margin-right: 15px !important"><i class="fas fa-edit"></i></a>
                            </span>
                            <p style="margin-left: 15px !important">answer: &nbsp; {{ $without_parent_question->answer }}</p>
                        </div>
                        
                        @endforeach
                        @endif
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
            //console.log(id)
            $.ajax({
                type:"GET",
                url: "{{ url('admin/question/written-question/edit')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    $("#edit_modal").html(data.html);
                    $("#kk_modal_edit").modal('show');
                }
            });
        });
        
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