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
                            <div class="messages"></div>
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
                                        data-hide-search="true"  required>
                                        <option value="">Manual Input</option>
                                        <option value="">Random Question</option>
                                        <option value="">Select Question</option>
                                    </select>
                                    <div class="help-block with-errors subject-error"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-2  fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required"></span>
                                    </label>
                                    <!--end::Label-->
                                    <button type="submit" id="kk_submit_for_question" class="btn btn-small btn-primary">Submit</button>
                                </div>
                                <!-- end: col-->   
                            
                            </div>
                            <!--end::Input group-->
                        
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card--> 
            </div>

            <div class="col-md-12 mt-6" >
                <!--begin::Tables Widget 9-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <div id="table_data">

                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->
</div>


@endsection

@push('script')
<script type="text/javascript">
    // Get Subject
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
                            if(exam_detail.subject){
                                $('select[name="subject"]').append(
                                '<option value="' + exam_detail.subject.id + '">' + exam_detail.subject.name   +  '</option>');
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

    // Get Question
    $('#kk_submit_for_question_form').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

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
        
    });

    //ajax pagination
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
    });

    function fetch_data(page)
    {
        $.ajax({
            url:"?page="+page,
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

    //question add to a subject
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
        $('#passage_id').find(':selected').each(function() {
            var passage_id = $(this).val();
            $(".sub_chk:checked").each(function() {
                var question_id = $(this).attr('data-id');
                allVals.push({
                    'passage_id' : passage_id,
                    'question_id' : question_id 
                });
            });
    
        });
      
        
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
                            toastr.success(data.message)
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
 
</script>
@endpush