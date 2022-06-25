@extends('layouts.app')
@section('title', 'Model test')

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
                <li class="breadcrumb-item text-muted">Custom Model Test</li>
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
            <p id="remaining_time" class="mt-2 fw-bold"></p>
            <!--begin::Button-->
            {{-- <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a> --}}
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
                        <h3 class="card-title fs-2 fw-bolder">Custom Model Test</h3>
                    </div>
                    <div class="card-header fw-bold d-flex justify-content-between py-3 px-5">
                        <div class="left fw-bolder">
                            <p>Total Question: {{ request()->number_of_question }}</p>
                            <p>Total Mark: {{ request()->total_mark }}</p>
                            <p>Cut Mark: {{ request()->cut_mark }}</p>
                            <p>Negative Mark: {{ request()->negative_mark }}</p>
                        </div>
                        <div class="right fw-bolder">
                            <p id="time_countdown">Duration: {{ request()->duration }}</p>
                            <p>Time: {{ date('h:i:s a', time()) }}</p>
                            <p>Date: {{ date('d-m-Y') }} </p>
                        </div>
                    </div>

                    {{-- Hidden field  --}}
                    <input type="hidden" name="total_mark" id="mark" value="{{ request()->total_mark }}">
                    <input type="hidden" name="cut_mark" id="cut_mark" value="{{ request()->cut_mark }}">
                    <input type="hidden" name="negative_mark"  id="negative_mark" value="{{ request()->negative_mark }}">
                    <input type="hidden" name="sub_category_id" id="sub_category" value="{{ request()->sub_category }}">
                    <input type="hidden" name="duration" id="duration" value="{{ request()->duration }}">

                   
                    <div class="card-body">
                        <div class="row">
                        @foreach($questions as $question)

                            <div class="col-md-6 ">
                                <div class="card card-bordered mb-5">
                                    <div class="card-header card-success">
                                        <h3 class="card-title text-gray-700 fw-bolder cursor-default mb-0 question" data-id={{ $question->id }} data-subject_id="{{ $question->subject_id }}" data-passage_id={{ $question->passage_id }}>
                                                <span > {{ $question->id }}. {{$question->question}} </span>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row"  style="font-size: 16px">
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-passage_id={{ $question->passage_id }} data-option="1"> 
                                                    <span ><i class="far fa-circle fa-2xl"></i></span> {{$question->question_option->option_1 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-passage_id={{ $question->passage_id }} data-option="2"> 
                                                    <span> <i class="far fa-circle fa-2xl"></i> </span> {{$question->question_option->option_2}}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-passage_id={{ $question->passage_id }} data-option="3"> 
                                                    <span ><i class="far fa-circle fa-2xl"></i></span> {{$question->question_option->option_3 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold cursor-pointer click-option" data-id="{{ $question->id }}" data-passage_id={{ $question->passage_id }} data-option="4" > 
                                                    <span ><i class="far fa-circle fa-2xl"></i></span> {{$question->question_option->option_4 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
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
                        <button class="btn btn-primary btn-sm py-3 px-20 fs-5 d-none" id="kk_exam_submit" >Submit</button>
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

        //getting all question id and passage id on page load
        var exam_selected_questions = [];
        $(".question").each(function(){
            var data = {};
            data.passage_id = parseInt(($(this).data('passage_id')));
            data.subject_id = parseInt(($(this).data('subject_id')));
            data.question_id = parseInt(($(this).data('id')));
            data.select_option = 0;
            exam_selected_questions.push(data);
                
        })

        //console.log(exam_selected_questions);

        // array filter for unique value from option
        // function onlyUnique(value, index, self) {
        //     return self.indexOf(value) === index;
        // }
        // // distinct value 
        // var unique_exam_questions = exam_questions.filter(onlyUnique);

        var click_count = 0;
        //getting data from option and update exam_selected_questions select_option field value
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

            //add a class
            $(this).find('i').removeClass('far');
            $(this).find('i').addClass('fas');
            
            //disable click
            $(this).closest('.row').find('p').off('click').removeClass('cursor-pointer');

            // hide show force submit button 
            if(exam_selected_questions.length == click_count){
                $("#kk_exam_force_submit").addClass('d-none');
                $("#kk_exam_submit").removeClass('d-none');
            }


        })

        // setTimeout(function() {
        //     console.log('val = '+click_count);   
        // }, 5000);
       
      
        //force submit
        $('#kk_exam_force_submit').on('click', function(e){
            e.preventDefault();

            var mark = $('#mark').val();
            var cut_mark = $('#cut_mark').val();
            var negative_mark = $('#negative_mark').val();
            var sub_category_id = $('#sub_category').val();
            var duration = $('#duration').val();
            //console.log(sub_category_id);

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

                                'mark' : mark,
                                'cut_mark' : cut_mark,
                                'negative_mark' : negative_mark,
                                'sub_category_id' : sub_category_id,
                            },
                            dataType: 'json',
                            success:function(data){
                                toastr.success(data.message);
                                location.href = data.url;
                            
                            }
                        })
                    }
                }))
            }
   
        })

        //submit
        $('#kk_exam_submit').on('click', function(e){
            e.preventDefault();

            var mark = $('#mark').val();
            var cut_mark = $('#cut_mark').val();
            var negative_mark = $('#negative_mark').val();
            var sub_category_id = $('#sub_category').val();
            var duration = $('#duration').val();
            //console.log(sub_category_id);

           
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your exam has been submitted',
                showConfirmButton: false,
                timer: 1500
            })
           
            //if all quwstion answer
            $.ajax({
                type:"POST",
                url: "{{ url('/model-test/submitted-data') }}",
                data :{
                    "_token": "{{ csrf_token() }}",
                    'submitted_data' : exam_selected_questions,

                    'mark' : mark,
                    'cut_mark' : cut_mark,
                    'negative_mark' : negative_mark,
                    'sub_category_id' : sub_category_id,
                },
                dataType: 'json',
                success:function(data){
                    toastr.success(data.message);
                    location.href = data.url;
                
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
            //console.log(timer2);
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
            // $('#time_countdown').html('<p>Time Remaining  <span style="color:red; font-size:24px;">' + minutes + ':' + seconds +'</span></p>');
            $('#remaining_time').html('<p ">Time Remaining :  <span style="color:red; font-size:24px;">' + minutes + ':' + seconds +'</span></p>');
            timer2 = minutes + ':' + seconds;
        }, 1000);
    
    })
    </script>
@endpush


 