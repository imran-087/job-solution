@extends('layouts.app')
@section('title', 'Exam')

@section('toolbar')
<!--start::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Exam </h1>
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
                <li class="breadcrumb-item text-muted">Model Test</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Model Test Question</li>
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
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid col-12" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header py-10 d-flex flex-column justify-content-center align-items-center">
                        <h2 class="card-title  fw-bolder"> {{$exam_analytics->exam->name ?? 'Custom Exam' }}</h2>
                    </div>
                    <div class="card-header fw-bold d-flex justify-content-between py-3 px-5">
                        <div class="left fw-bolder">
                            <p>Total Question: {{ $exam_analytics->total_question ?? '' }}</p>
                            <p>Total Mark: {{ $exam_analytics->total_mark ?? '' }}</p>
                            <p>Cut Mark: {{ $exam_analytics->cut_mark ?? '' }}</p>
                            <p>Negative Mark: {{ $exam_analytics->negative_mark ?? '' }}</p>
                        </div>
                        <div class="righ fw-bolder">
                            <p>Duration: {{ $exam_analytics->duration ?? '' }} Min.</p>
                            <p>Time: {{  Carbon\Carbon::parse($exam_analytics->exam_time)->format('g:i:s A')   }}</p>
                            <p>Date: {{  Carbon\Carbon::parse($exam_analytics->exam_time)->format('d-m-Y ')  }}</p>
                        </div>
                    </div>
                    <div class="card result">
                        <div class="card-body text-center mb-0">
                            <button class="btn btn-sm btn-primary">Answered <span class="badge badge-circle badge-light"> {{ $exam_analytics->answered }}</span></button>
                            <button class="btn btn-sm btn-info">Right <span class="badge badge-circle badge-light"> {{ $exam_analytics->right_ans }}</span></button>
                            <button class="btn btn-sm btn-danger">Wrong <span class="badge badge-circle badge-light"> {{ $exam_analytics->wrong_ans }}</span></button>
                            <button class="btn btn-sm btn-warning">Not Answer <span class="badge badge-circle badge-light"> {{ $exam_analytics->not_ans }}</span></button>
                            <button class="btn btn-sm btn-success">Obtain Mark <span class="badge badge-circle badge-light"> {{ $exam_analytics->obtain_mark }}</span></button>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="card-body">
                        <div class="row">
                            @foreach($exam_result_collection as $subject_id => $subject_collection)
                            @php $subject = App\Models\Subject::where('id', $subject_id)->value('name') @endphp
                            <h4 class="text-center text-decoration-underline" > {{ $subject }}</h4>
                            <br><br><br>
                                @foreach( $subject_collection as $passage_id => $passage_collection )
                                @php $passage = App\Models\Passage::where('id', $passage_id)->value('passage') @endphp
                                <p class="fw-7"> {!! $passage !!}</p>
                                    @foreach($passage_collection as $result_data)
                                        @php $result_data = (object) $result_data @endphp
                                        
                                        <div class="col-md-6">
                                            <div class="card card-bordered mb-5">
                                                <div class="card-header card-success">
                                                    <h3 class="card-title text-gray-700 fw-bolder cursor-default mb-0 result_data" >
                                                            <span> {{ $loop->index+1 }}.  {{$result_data->question }} </span>
                                                    </h3>
                                                    <div class="card-toolbar">
                                                        <a href="javascript:;" class="btn btn-sm btn-icon btn-active-color-primary editQuestion" data-id="{{$result_data->question_id }}" data-ques_type="{{$result_data->question_type}}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row"  style="font-size: 16px">
                                                        <div class="col-md-6">
                                                            <p class="{{ $result_data->answer == 1 ? 'right-answer' : '' }} text-gray-800 fw-bold " > 
                                                                <span ><i 
                                                                    @if($result_data->select_option == 1)
                                                                        class="fas fa-check-circle fa-2xl"
                                                                    @elseif($result_data->select_option == 0)
                                                                        class="far fa-circle fa-2xl"
                                                                    
                                                                    @else
                                                                        class="fas fa-ban fa-2xl"
                                                                    @endif
                                                                    ></i>
                                                                </span> {{$result_data->option_1 }} 
                                                                <span>
                                                                    <i
                                                                        @if($result_data->select_option != 0 && $result_data->select_option == 1)
                                                                        class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                        @endif
                                                                        >
                                                                    </i>
                                                                </span>
                                                                
                                                                
                                                            </p>
                                                            @if($result_data->question_type == 'image')
                                                            <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                <span class="symbol-label">
                                                                    <img src="{{ asset($result_data->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                                </span>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="text-gray-800 fw-bold {{ $result_data->answer == 2 ? 'right-answer' : '' }}"  > 
                                                                <span><i 
                                                                    @if($result_data->select_option == 2)
                                                                        class="fas fa-check-circle fa-2xl"
                                                                    @elseif($result_data->select_option == 0)
                                                                        class="far fa-circle fa-2xl"
                                                                        
                                                                    @else
                                                                    class="fas fa-ban fa-2xl"
                                                                    @endif
                                                                    ></i> 
                                                                </span> {{$result_data->option_2}}
                                                                <span>
                                                                    <i
                                                                        @if($result_data->select_option != 0 && $result_data->select_option == 2)
                                                                        class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                        @endif
                                                                        >
                                                                    </i>
                                                                </span>
                                                            </p>
                                                            @if($result_data->question_type == 'image')
                                                            <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                <span class="symbol-label">
                                                                    <img src="{{ asset($result_data->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                                </span>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="text-gray-800 fw-bold {{ $result_data->answer == 3 ? 'right-answer' : '' }}"> 
                                                                <span ><i 
                                                                    @if($result_data->select_option == 3)
                                                                        class="fas fa-check-circle fa-2xl"
                                                                    @elseif($result_data->select_option == 0)
                                                                        class="far fa-circle fa-2xl"
                                                                        
                                                                    @else
                                                                        class="fas fa-ban fa-2xl"
                                                                    @endif
                                                                    ></i>
                                                                </span> {{$result_data->option_3 }}
                                                                <span>
                                                                    <i
                                                                        @if($result_data->select_option != 0 && $result_data->select_option == 3)
                                                                        class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                        @endif
                                                                        >
                                                                    </i>
                                                                </span>
                                                            </p>
                                                            @if($result_data->question_type == 'image')
                                                            <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                <span class="symbol-label">
                                                                    <img src="{{ asset($result_data->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                                </span>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        @isset($result_data->answer == 4)
                                                            
                                                        <div class="col-md-6">
                                                            <p class="text-gray-800 fw-bold {{ $result_data->answer == 4 ? 'right-answer' : '' }}" > 
                                                                <span><i 
                                                                    @if($result_data->select_option == 4)
                                                                        class="fas fa-check-circle fa-2xl"
                                                                    @elseif($result_data->select_option == 0)
                                                                        class="far fa-circle fa-2xl"
                                                                    
                                                                    @else
                                                                        class="fas fa-ban fa-2xl"
                                                                    @endif
                                                                    ></i>
                                                                </span> {{$result_data->option_4 }}
                                                                <span>
                                                                    <i
                                                                        @if($result_data->select_option != 0 && $result_data->select_option == 4)
                                                                        class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                        @endif
                                                                        >
                                                                    </i>
                                                                </span>
                                                            </p>
                                                            @if($result_data->question_type == 'image')
                                                            <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                <span class="symbol-label">
                                                                    <img src="{{ asset($result_data->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                                </span>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        @endisset
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endforeach     
                        </div>
                    </div>  
                </div>
            </div>
        </div>
              
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

 <!--begin::Modal - Edit Question-->
<div class="modal fade" id="kk_modal_show_question" tabindex="-1" aria-hidden="true">
    <div id="edit_question_modal"></div>
</div>
<!--end::Modal - Edit Question-->

    
@endsection

@push('script')
<script type="text/javascript">
        //edit Question
    $('.editQuestion').on('click', function() {
        var id = $(this).data('id')
        var ques_type = $(this).data('ques_type')
        console.log(ques_type)
        $.ajax({
            type:"GET",
            url: "{{ url('/question/edit-question')}}"+'/'+id+'/'+ques_type,
            dataType: 'json',
            success:function(data){
                $("#edit_question_modal").html(data.html);
                $("#kk_modal_show_question").modal('show');
            }
        });
    });

    //edit question cancel button
    $(document).on('click', '#kk_modal_new_service_cancel', function(){
        
        $("#kk_modal_show_question").modal('hide');
        
    })

    //update edited question
    $(document).on('submit', '#kk_modal_new_question_form', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')
        $('.indicator-label').hide()
        $('.indicator-progress').show()
        $('#kk_modal_new_service_submit').attr('disabled','true')

        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('/question/edit-question/update')}}",
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
                    // empty the form
                    $('#kk_modal_new_question_form')[0].reset();
                    $("#kk_modal_show_question").modal('hide');

                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "{{__('Ok, got it!')}}",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')

            }
        });
    })
</script>
@endpush



{{-- @php $result_data = (object) $result_data @endphp
                                <div class="col-md-6">
                                    <div class="card card-bordered mb-5">
                                        <div class="card-header card-success">
                                            <h3 class="card-title text-gray-700 fw-bolder cursor-default mb-0 result_data" >
                                                    <span> {{ $loop->index+1 }}.  {{$result_data->question }} </span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <a href="javascript:;" class="btn btn-sm btn-icon btn-active-color-primary editQuestion" data-id="{{$result_data->question_id }}" data-ques_type="{{$result_data->question_type}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row"  style="font-size: 16px">
                                                <div class="col-md-6">
                                                    <p class="{{ $result_data->answer == 1 ? 'right-answer' : '' }} text-gray-800 fw-bold " > 
                                                        <span ><i 
                                                            @if($result_data->select_option == 1)
                                                                class="fas fa-check-circle fa-2xl"
                                                            @elseif($result_data->select_option == 0)
                                                                class="far fa-circle fa-2xl"
                                                               
                                                            @else
                                                                class="fas fa-ban fa-2xl"
                                                            @endif
                                                            ></i>
                                                        </span> {{$result_data->option_1 }} 
                                                        <span>
                                                            <i
                                                                @if($result_data->select_option != 0 && $result_data->select_option == 1)
                                                                class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                @endif
                                                                >
                                                            </i>
                                                        </span>
                                                        
                                                        
                                                    </p>
                                                    @if($result_data->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($result_data->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-gray-800 fw-bold {{ $result_data->answer == 2 ? 'right-answer' : '' }}"  > 
                                                        <span><i 
                                                            @if($result_data->select_option == 2)
                                                                class="fas fa-check-circle fa-2xl"
                                                            @elseif($result_data->select_option == 0)
                                                                class="far fa-circle fa-2xl"
                                                                
                                                            @else
                                                               class="fas fa-ban fa-2xl"
                                                            @endif
                                                            ></i> 
                                                        </span> {{$result_data->option_2}}
                                                        <span>
                                                            <i
                                                                @if($result_data->select_option != 0 && $result_data->select_option == 2)
                                                                class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                @endif
                                                                >
                                                            </i>
                                                        </span>
                                                    </p>
                                                    @if($result_data->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($result_data->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-gray-800 fw-bold {{ $result_data->answer == 3 ? 'right-answer' : '' }}"> 
                                                        <span ><i 
                                                            @if($result_data->select_option == 3)
                                                                class="fas fa-check-circle fa-2xl"
                                                            @elseif($result_data->select_option == 0)
                                                                class="far fa-circle fa-2xl"
                                                                
                                                            @else
                                                                class="fas fa-ban fa-2xl"
                                                             @endif
                                                            ></i>
                                                        </span> {{$result_data->option_3 }}
                                                        <span>
                                                            <i
                                                                @if($result_data->select_option != 0 && $result_data->select_option == 3)
                                                                class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                @endif
                                                                >
                                                            </i>
                                                        </span>
                                                    </p>
                                                    @if($result_data->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($result_data->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-gray-800 fw-bold {{ $result_data->answer == 4 ? 'right-answer' : '' }}" > 
                                                        <span><i 
                                                            @if($result_data->select_option == 4)
                                                                class="fas fa-check-circle fa-2xl"
                                                            @elseif($result_data->select_option == 0)
                                                                class="far fa-circle fa-2xl"
                                                               
                                                            @else
                                                                class="fas fa-ban fa-2xl"
                                                            @endif
                                                            ></i>
                                                        </span> {{$result_data->option_4 }}
                                                        <span>
                                                            <i
                                                                @if($result_data->select_option != 0 && $result_data->select_option == 4)
                                                                class="{{ $result_data->select_option == $result_data->answer ? 'fas fa-check' : 'fas fa-times'  }} fa-2xl" 
                                                                @endif
                                                                >
                                                            </i>
                                                        </span>
                                                    </p>
                                                    @if($result_data->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($result_data->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}