@extends('admin.layout.app')
@section('title', 'Exam - Create exam')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Exam</h1>
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
                    <li class="breadcrumb-item text-muted">Create Exam</li>
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
    <div class="post d-flex flex-column-fluid col-12"  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
           
            <div class="col-md-12 mb-6">
                <!--begin::Card-->
                <div class="card mb-5">
                    <!--begin::Card body-->
                    <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                        <!--begin:Form-->
                        <form id="kk_submit_for_question_form" class="form"  >
                            
                            {{-- csrf token  --}}
                            @csrf
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3 mt-3">Add Question into Subject</h1>
                               
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-muted fw-bold fs-5">Fill up the form and submit
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Heading-->

                            <div class="messages col-md-8 offset-2 mb-13"></div>


                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">Select Exam</label>
                                    <select class="form-select form-select-solid " data-control="select2"
                                        data-hide-search="true" data-placeholder="Select exam" name="exam_id"
                                        id="exam" required>
                                        <option value="">Choose ...</option>
                                        @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors exam-error"></div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">Select subject</label>
                                    <select class="form-select form-select-solid " data-control="select2"
                                        data-hide-search="true" data-placeholder="Select subject" name="subject"
                                        id="subject" required>
                                        
                                    </select>
                                    <div class="help-block with-errors subject-error"></div>
                                </div>
                                <!--end::Col-->
                               
                                <!--begin::Col-->
                                <div class="col-md-3 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">Select Type</label>
                                    <select class="form-select form-select-solid " data-control="select2"
                                        data-hide-search="true" name="ques_type" id="ques_type"  required>
                                        <option value="">Select type</option>
                                        <option value="random">Random Question</option>
                                        <option value="select">Select Question</option>
                                        <option value="manual">Manual Input</option>
                                      
                                    </select>
                                    <div class="help-block with-errors ques_type-error"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-1 fv-row d-none" id="number" >
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Number</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"  name="question_number" id="question_number" >
                                    <div class="help-block with-errors question_number-error"></div>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-2  fv-row" id=number_of_question_for_this_subject>
                                
                                </div>
                                {{-- hidden  --}}
                                <input type="hidden" name="number_of_question_for_this_subject">
                                <!-- end: col-->
                               
                                {{-- <!--begin::Col-->
                                <div class="col-md-1  fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required"></span>
                                    </label>
                                    <!--end::Label-->
                                    <button type="submit" id="kk_submit_for_question" class="btn btn-small btn-primary">Submit</button>
                                </div>
                                <!-- end: col-->    --}}
                            
                            </div>
                            <!--end::Input group-->
                            <div class="div d-none" id="manual_input">
                                <!--begin::Input group-->
                                <div class="row g-9 pb-4 mb-13">
                                    <!--begin::Col-->
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row offset-3">
                                        <label class="required fs-6 fw-bold mb-2">Question Type</label>
                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                            data-placeholder="" name="type" id="type">
                                            <option value="mcq" selected>MCQ</option>
                                            <option value="image">Image MCQ</option>
                                            <option value="passage">Passage MCQ</option>
                                        </select>
                                        
                                    </div>
                                    <!--end:Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row ">
                                        <label class="required fs-6 fw-bold mb-2">Option Number</label>
                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                            data-placeholder="" name="option" id="option">
                                            <option value="4" selected>4</option>
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                        </select>
                                        
                                    </div>
                                    <!--end:Col-->
                                    
                                </div>
                                
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                                <div class="text-center d-flex justify-content-end py-4 px-4" >
                                    <button type="submit" id="kk_submit_for_question" class="btn btn-small btn-primary" style="padding: 10px 70px">Submit</button>
                                </div>
                            <!--end::Actions-->
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card--> 
            </div>

            <div class="col-md-12 mt-6" >
                <!--begin::Tables Widget 9-->
                <div id="table_data">

                </div>
                   
              
            </div>
        </div>
    </div>
    <!--end::Post-->
</div>


@endsection

@push('script')
<script type="text/javascript">
    // Get exam Subject
    $('#exam').on('change', function () {
        var examID = $(this).val();
        if (examID) {
            $.ajax({
                url: '/admin/exam-details/get-subject/subject/' + examID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#subject').empty();
                        $('#subject').append('<option value="">Choose...</option>');
                        $.each(data, function (key, exam_detail) {
                            if(exam_detail.question_ids == null){
                                if(exam_detail.subject){
                                    $('select[name="subject"]').append(
                                    '<option value="' + exam_detail.subject.id + '">' + exam_detail.subject.name   +  '&nbsp&nbsp--&nbsp Num. Of Q. &nbsp&nbsp&nbsp--&nbsp' + exam_detail.number_of_question +'</span></option>');
                                }
                            }
                            else if(exam_detail.question_ids.length != exam_detail.number_of_question){
                                if(exam_detail.subject){
                                    $('select[name="subject"]').append(
                                    '<option value="' + exam_detail.subject.id + '">' + exam_detail.subject.name   +  '</option>');
                                }
                            }
                           
                        });
                    }
                        else {
                        $('#subject').empty(); 
                    }
                }
            });
        } else {
            $('#subject').empty();
        }
    });

    //get_number_of_question_for_this_subject
    $(document).on('change', '#subject', function(){
        var subject_id = $(this).val()
        var examID = $('#exam').find(':selected').val();
        //console.log(examID);
       
        $.ajax({
            url: '/admin/exam-details/get-subject-number-of-question' ,
            type: "GET",
            dataType: "json",
            data:{
                subject_id : subject_id,
                exam_id : examID
            },
            success: function (data) {
                console.log(data);
                if (data) {
                    $("input[name=number_of_question_for_this_subject]").val(data.subject_number_of_ques);
                    $('#number_of_question_for_this_subject').empty();
                    var val = '<label class="d-flex align-items-center fs-6 fw-bold mb-2"><span class="required">Subject Total Question</span> </label>'
                    val += '<span class="badge badge-primary badge-lg"><span id=result> 0  </span> / ' + data.subject_number_of_ques + '</span>'
                            
                    $('#number_of_question_for_this_subject').html(val);
                    if(data.subject_previous_ques != null){
                        $("#result").text(data.subject_previous_ques)
                    }
                    
                }
                    else {
                    $('#number_of_question_for_this_subject').empty(); 
                }
            }
        });
       
    });
    

    //random input number of question field show/hide
    $("#ques_type").on('change', function(){
        var val = $(this).val();
        if(val == 'random'){
            $('#number').removeClass('d-none');
            $('#manual_input').addClass('d-none');
            $('#table_data').html('');

            //disabled submit button
            $('#kk_submit_for_question').attr('disabled', true);


            //get question_number field value and show submit button
            $('#question_number').on('keyup', function(){
                var question_number  = $(this).val();
                var number_of_question_for_this_subject = $("input[name=number_of_question_for_this_subject]").val();
                //console.log(number_of_question_for_this_subject);
                $('#result').text(parseInt(question_number));
                if(parseInt(question_number) == number_of_question_for_this_subject){
                    $('#kk_submit_for_question').attr('disabled', false);
                }else{
                    $('#kk_submit_for_question').attr('disabled', true);
                }
            })


        } else if(val == 'manual'){
            $('#number').removeClass('d-none');
            $('#manual_input').removeClass('d-none');
            $('#table_data').html('');

             //disabled submit button
            $('#kk_submit_for_question').attr('disabled', true);


            //get question_number field value and show submit button
            $('#question_number').on('keyup', function(){
              
                var question_number  = $(this).val();
                
                var number_of_question_for_this_subject = $("input[name=number_of_question_for_this_subject]").val();
                //console.log(number_of_question_for_this_subject);
                
                $('#result').text(parseInt(question_number));
               
                if(number_of_question_for_this_subject >= parseInt(question_number) ){
                    $('#kk_submit_for_question').attr('disabled', false);
                }else{
                    $('#kk_submit_for_question').attr('disabled', true);
                }
            })


        } else{
            $('#number').addClass('d-none');
            $('#manual_input').addClass('d-none');
        }
    })

    
    

    // get select question , manual input layout and random question store
    $('#kk_submit_for_question_form').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        var random_question = $('#ques_type').find(":selected").val();
       
        if(random_question == 'random'){
            $.ajax({
                type:"POST",
                url: "{{ route('admin.exam-details.random-question-add') }}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.success){
                        toastr.success(data.message);
                        location.reload();
                    }else{
                       var alertBox = '<div class="alert alert-danger text-center" alert-dismissable">' + data.message + '</div>';
                        $('.messages').html(alertBox).show();
                        setTimeout(function() { 
                            $('.messages').html(alertBox).hide();
                        }, 5000);
                    }
                    
                }
            });
        }else{
            $.ajax({
                type:"POST",
                url: "{{ route('admin.exam-details.get-question') }}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    $('#table_data').html(data.html);
                }
            });
        }
  
    });

    //ajax pagination
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
    });

    function fetch_data(page)
    {
        let ques_type = $("#ques_type").find(":selected").val();
        let subject = $("#subject").find(":selected").val();
        let exam_id = $('#exam').find(':selected').val();
        $.ajax({
            
            type:"POST",
            url:"/admin/exam-details/get-subject-question?page="+page,
            data: {
                "_token": "{{ csrf_token() }}",
                "ques_type" : ques_type,
                "subject" : subject,
                "exam_id" : exam_id
                
            },
            success:function(data)
            {
                $('#table_data').html(data.html);
            }
        });
    }


    //checkbox count
    $(document).ready(function(){

        //var $checkboxes = $(documnet).(' input[type="checkbox"]');
       
        $(document).on('change', 'input[type="checkbox"]', function(){
            
           var subject_total_question = $('#number_of_question').val();
           var numb_of_question_in_question_ids = $('#numb_of_question_in_question_ids').val();

           var numberOfChecked = $('input:checkbox:checked').length ;
            var  remaingQuestionToChecked = subject_total_question - numberOfChecked ;

            if(subject_total_question == numberOfChecked) {
             
                $('#kk_add_question').attr('disabled' , false);
            }
            else{
                console.log('true');
                $('#kk_add_question').attr('disabled' , true);
            }
           
            if(numberOfChecked > subject_total_question){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Number of select question must be equal to Subject Total Question.',
                footer: '<a href="">Pls reduce Num of Ques and try again?</a>'
                })
            }

            let html = '<p>Total = ' + subject_total_question + '</p>';
                html += '<p>Selectd = ' + numberOfChecked + '</p>';
                html += '<p>Remaining = ' + remaingQuestionToChecked + '</p>';
            $('#checbox-calucator').html(html);
            // $('#remaing-question-to-checked').text(remaingQuestionToChecked);
                    
        });
           
    });

    //selectbox
    $(document).on('click', '#master', function(e) {
        if($(this).is(':checked',true))
        {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked',false);
        }
    });


    //add question
    $(document).on('click', '.add_question', function(e) {

        //console.log('here');
        let subject_id = $('#subject').find(':selected').val();
        let exam_id = $('#exam').find(':selected').val();

        var number_of_question = $('#number_of_question').val();

        var numberOfChecked = $('.sub_chk:checked').length;
        //console.log(numberOfChecked);
        
        var allVals = [];
       // var allVals['question_id'] = '';
        // $('#passage_id').find(':selected').each(function() {
        //     var passage_id = $(this).val();
        
        //get all question_id and passage_id
            $(".sub_chk:checked").each(function() {
                var question_id = $(this).attr('data-id');
                var passage_id = $(this).attr('data-passage_id');
                allVals.push({
                    'question_id' : question_id,
                    'passage_id' : passage_id 
                });
            });
    
        // });
      
        
        // if(allVals.length <=0)
        // {
        //     toastr.error("Please select Question");
  
        // } 
        // else if(allVals.length > number_of_question)
        // {
        //     toastr.error("You cannot add more than "+ number_of_question +" question into this subject");
        // }
        //  else {


            Swal.fire({
                text: "Are you sure you want to add this question?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Confirm",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function (o) {
                if(o.value){ //if agree
                    // var join_selected_values[] = allVals;
                    //console.log(allVals);
                $.ajax({
                    url: '/admin/exam-details/exam-question/add',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        'exam_id' : exam_id,
                        'subject_id' : subject_id,
                        'ids' : allVals,
                        //'passage_id': allVals['passage_id']
                    },
                    success: function (data) {
                        if (data.success) {
                            $('#table_data').html('');
                            toastr.success(data.message);
                            location.reload();
                        } else if (data.error) {
                            toastr.error(data.message)
                        } else {
                            toastr.error('Something went wrong!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });

                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });

                }else{ //if cancel
                    Swal.fire({
                        text: "Question has not been added",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }

            }))
        // }
    });

    //maunal question save
    $(document).on('submit', '#kk_modal_new_mcq_form', function(e){
        e.preventDefault()
        $('.with-errors').text('')
        // $('.indicator-label').hide()
        // $('.indicator-progress').show()
        // $('#kk_modal_new_service_submit').attr('disabled','true')

        var formData = new FormData(this);
        
        // var type = $('#type').val();
        // if(type == 'passage'){
        //     formData.append('passage', myEditor.getData());
        // }
       
        $.ajax({
            type:"POST",
            url: "{{ route('admin.manual_question_store') }}",
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
                    $('#kk_modal_new_category_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_mcq_form')[0].reset();
                   
                    Swal.fire({
                            text: data.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "{{__('Ok, got it!')}}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function () {
                            //refresh
                            location.reload();
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