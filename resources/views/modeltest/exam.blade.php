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
        <div class="d-flex align-items-center justify-content-center py-1 fw-bold">
            <p id="remaining_time" class="mt-2 fw-bold"></p>
            <!--begin::Button-->
            {{-- <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary ms-2">Back</a> --}}
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
                        <h3 class="card-title fw-bold">{{$exam->name}}</h3>
                    </div>
                    <div class="card-header fw-bold d-flex justify-content-between py-3 px-5">
                        <div class="left fw-bolder">
                            <p>Total Question: {{ $exam->number_of_question }}</p>
                            <p>Total Mark: {{ $exam->total_mark }}</p>
                            <p>Cut Mark: {{ $exam->cut_mark }}</p>
                            <p>Negative Mark: {{ $exam->negative_mark }}</p>
                        </div>
                        <div class="right fw-bolder">
                            <p id="time_countdown">Duration: {{ $exam->duration }}</p>
                            <p>Time: {{ Carbon\Carbon::parse($exam->exam_starting_time)->format('g:i:s A') }}</p>
                            <p>Date: {{ Carbon\Carbon::parse($exam->exam_starting_time)->format('d-m-Y ') }}</p>
                            
                        </div>
                    </div>

                    {{-- Hidden field  --}}
                    <input type="hidden" name="exam_id" value="{{ $exam->id }}" id="exam_id">
                    <input type="hidden" name="duration" value="{{ $exam->duration }}" id="duration">
                   
                    <div class="card-body">
                        <div class="row">
                        @foreach($questions as $question)
                        @php $question = (object) $question @endphp
                            <div class="col-md-6 ">
                                <div class="card card-bordered mb-5">
                                    <div class="card-header card-success">
                                        <h3 class="card-title text-gray-700 fw-bolder cursor-default mb-0 question" data-id="{{ $question->question_id }}" data-subject_id="{{ $question->subject_id }}" data-passage_id="{{ $question->passage_id }}">
                                                <span > {{ $loop->index+1 }}. {{$question->question}} </span>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row"  style="font-size: 16px">
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->question_id }}" data-option="1"> 
                                                    <span ><i class="far fa-circle fa-2xl"></i></span> {{$question->option_1 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->question_id }}" data-option="2"> 
                                                    <span> <i class="far fa-circle fa-2xl"></i> </span> {{$question->option_2}}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->question_id }}" data-option="3"> 
                                                    <span ><i class="far fa-circle fa-2xl"></i></span> {{$question->option_3 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->question_id }}" data-option="4" > 
                                                    <span ><i class="far fa-circle fa-2xl"></i></span> {{$question->option_4 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-primary btn-sm py-3 px-20 fs-5" id="kk_exam_force_submit" data-text="force_submit">Submit</button>
                        <button class="btn btn-primary btn-sm py-3 px-20 fs-5 d-none" id="kk_exam_submit" data-text="submit">Submit</button>
                    </div>
                </div>
            </div>
            
        </div>
              
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
    
@endsection


@push('script')
    <script type="text/javascript">

    $(document).ready(function(){
      
        var exam_selected_questions = [];
        $(".question").each(function(){
            var data = {};
            data.passage_id = parseInt(($(this).data('passage_id')));
            data.subject_id = parseInt(($(this).data('subject_id')));
            data.question_id = parseInt(($(this).data('id')));
            data.select_option = 0;
            exam_selected_questions.push(data);
                
        })
        //console.log(exam_selected_questions.length);

        var click_count = 0;
        $('.click-option').on('click', function(){
            //count the number of how many question are answered
            click_count +=1;

            var data = {};
            data.id = parseInt($(this).data('id'));
            data.option_no = parseInt($(this).data('option'));

            objIndex = exam_selected_questions.findIndex((obj => obj.question_id == data.id));
            //console.log("Before update: ", exam_selected_questions[objIndex]);

            exam_selected_questions[objIndex].select_option = data.option_no;
            //console.log("After update: ", exam_selected_questions[objIndex]);

            //console.log(exam_selected_questions);
            
            //add a class
            $(this).find('i').removeClass('far');
            $(this).find('i').addClass('fas');
            
            //disable click
            $(this).closest('.row').find('p').off('click').removeClass('cursor-pointer');
            //console.log(click_option);

            // hide show force submit button 
            if(exam_selected_questions.length == click_count){
                $("#kk_exam_force_submit").addClass('d-none');
                $("#kk_exam_submit").removeClass('d-none');
            }

        });

        
        //force submit
        $('#kk_exam_force_submit').on('click', function(e){
            e.preventDefault();

            var exam_id = $('#exam_id').val();

            //alert if all question are not answered
            //console.log(click_count);
            if(exam_selected_questions.length != click_count){
                Swal.fire({
                    text: "you are not answered all the question. if you want to sumbit? click Force Submit",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Force Submit",
                    cancelButtonText: "Go Back",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function (o) {
                    if(o.value){ //if agree
                        $.ajax({
                            type:"POST",
                            url: "{{ url('/model-test/submitted-data') }}",
                            data :{
                                "_token": "{{ csrf_token() }}",
                                'submitted_data' : exam_selected_questions,
                                'exam_id' : exam_id,
                            },
                            dataType: 'json',
                            success:function(data){
                                toastr.success(data.message);
                                location.href = data.url;
                                // location.href = "http://127.0.0.1:8000/model-test/result";
                            
                            }
                        })
                    }
                }))
            }

        })
       
        //submit 
        $('#kk_exam_submit').on('click', function(e){
            e.preventDefault();

            var exam_id = $('#exam_id').val();

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your exam has been submitted',
                showConfirmButton: false,
                timer: 1500
            })

            $.ajax({
                type:"POST",
                url: "{{ url('/model-test/submitted-data') }}",
                data :{
                    "_token": "{{ csrf_token() }}",
                    'submitted_data' : exam_selected_questions,
                    'exam_id' : exam_id,
                },
                dataType: 'json',
                success:function(data){
                    toastr.success(data.message);
                    location.href = data.url;
                    //location.href = "http://127.0.0.1:8000/model-test/result";
                }
            })
            
        })

        //set time interval for auto submit
        var exam_duration =  $('#duration').val();
        var exam_time_in_milisecond = exam_duration * 60000;
        //console.log(exam_time_in_milisecond);
        
        setTimeout(function() {
            $('#kk_exam_submit').trigger('click');    
        }, exam_time_in_milisecond);
                        

        //time counter 
        var timer2 = $('#duration').val();
            timer2 = timer2 + ':00';
        var interval = setInterval(function() {

            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) clearInterval(interval);
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;

            //minutes = (minutes < 10) ?  minutes : minutes;
            // $('#time_countdown').html('<p>Time Remaining :  <span style="color:red; font-size:24px;">' + minutes + ':' + seconds +'</span></p>');
            $('#remaining_time').html('<p ">Time Remaining :  <span style="color:red; font-size:24px;">' + minutes + ':' + seconds +'</span></p>');
            timer2 = minutes + ':' + seconds;
        }, 1000);
        
    })
    </script>
@endpush
