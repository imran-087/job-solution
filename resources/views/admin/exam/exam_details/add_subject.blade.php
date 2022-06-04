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
           
            <!--begin::Card-->
            <div class="card" >
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_add_subject_form" class="form" >
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3 mt-3">Add Subject into exam</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">Fill up the form and submit
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                       
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <input type="hidden" name="total_question">
                            <input type="hidden" name="total">
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Exam</label>
                                <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true"  name="exam_id"
                                    id="exam" required>
                                    <option value="">Select exam -- initial</option>

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
                                    data-hide-search="true" data-placeholder="Select subject" name="subject_id[]"
                                    id="subject" required>
                                    
                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3  fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Number of Ques. in this subject</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid number_of_question"  placeholder="Number of Question" name="number_of_question[]" value="0"/>
                                <div class="help-block with-errors number_of_question-error"></div>
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-1  fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required"></span>
                                </label>
                                <!--end::Label-->
                                <button class="btn btn-info btn-icon btn-sm addRow" type="button"><i class="fas fa-plus"></i></button> 
                            </div>
                            <!-- end: col-->
                            <!--begin::Col-->
                            <div class="col-md-2  fv-row" id=total_question>
                               
                            </div>
                            <!-- end: col-->
                           
                        </div>
                        <!--end::Input group-->
                        
                        <!-- append dynamic input-->
                        <div  class="newRow"></div>
                        <!-- append dynamic input-->
                       
                        

                        <!--begin::Actions-->
                        <div class="text-center d-flex justify-content-end py-4 px-4" >
                            <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary" style="padding: 10px 70px">
                                <span class="indicator-label">Submit</span>
                            </button>
                        </div>
                        <!--end::Actions-->

                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card--> 

            <div class="subject">

            </div>

        </div>
        <!--end::Container-->
    </div>
    
    <!--end::Post-->
</div>


@endsection

@push('script')
<script type="text/javascript">
    // Get Subject
    $('#exam').on('change', function () {

        $('select[name="subject_id[]"]').html('');

        var examID = $(this).val();
        if (examID) {
            $.ajax({
                url: '/admin/exam-details/get-subject/' + examID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#subject').empty();
                        $('#subject').append('<option value="">Choose...</option>');
                        $.each(data.subject, function (key, subject) {
                            if(subject.sub_category){
                                $('select[name="subject_id[]"]').append(
                                '<option value="' + subject.id + '">' + subject.name   + ' - ' + subject.sub_category.name + '</option>');
                               
                            }else{
                                $('select[name="subject_id[]"]').append(
                                '<option value="' + subject.id + '">' + subject.name   +' - '+ subject.main_category.name + '</option>');
                            } 
                        });
                        $('input[name="total_question"]').val(data.exam.number_of_question);
                        var val = '<label class="d-flex align-items-center fs-6 fw-bold mb-2"><span class="required">Exam Total Question</span> </label>'
                        val += '<span class="badge badge-primary badge-lg"><span id=result> 0  </span> / ' + data.exam.number_of_question + '</span>'
                                
                        $('#total_question').html(val)
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

   
    //add new input field
    $(document).on('click', '.addRow', function(e) {
        e.preventDefault();
        var html = '';
        html += '<div class="row g-9 mb-8 dynamic-row">'
            
        html += '    <div class="col-md-3 offset-3 fv-row">'
        html += '           <label class="required fs-6 fw-bold mb-2">Select subject</label>'
        html += '           <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select subject" name="subject_id[]" id="subject" required>'
        html += '           </select>'
        html += '           <div class="help-block with-errors subject-error"></div>'
        html += '     </div>'
        html += '     <div class="col-md-3  fv-row">'
        html += '         <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '               <span class="required">Number of Ques.</span>'
        html += '         </label>'
        html += '         <input type="text" class="form-control form-control-solid number_of_question" placeholder="Number of Question" name="number_of_question[]" value="0" />'
        html += '         <div class="help-block with-errors subject-error"></div>'
        html += '      </div>'
        html += '     <div class="col-md-1  fv-row">'
        html += '         <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '               <span class="required"></span>'
        html += '         </label>'
        html += '          <button class="btn btn-danger btn-icon btn-sm removeRow" type="button"><i class="fas fa-minus"></i></button>'
        html += '      </div>'
        html += '</div>'
        
        $(this).closest('.newRow').append(html);
        $('.newRow').append(html);
    });

    // remove row
    $(document).on('click', '.removeRow', function() {
        $(this).closest('.dynamic-row').remove();
        let number_of_question = $(this).parent().prev().find('.number_of_question').val();
        //console.log(number_of_question);
        substructTotalQuestion(number_of_question);
        //$(this).remove();
    });

    function substructTotalQuestion(number_of_question)
    {
        let total_question = $('#result').text();
        let input_total = parseInt(total_question) - parseInt(number_of_question);
        
        $("#result").html(input_total);
    }

    $('#kk_modal_new_service_submit').attr('disabled', true);



    $(document).on('keyup', ".number_of_question",function () {
        var input_total = 0;
      
        $('.number_of_question').each(function(){
            input_total += parseFloat($(this).val());
        })  

        $("#result").html(input_total);

        var total_question = $('input[name="total_question"]').val();

        if(input_total == total_question) {

            $('#kk_modal_new_service_submit').attr('disabled' , false);
        }
       
        else{
            $('#kk_modal_new_service_submit').attr('disabled' , true);
        }

        if ( input_total > total_question){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Numer of input question must be equal to  Total Question.',
                footer: '<a href="">Pls reduce Num of Ques?</a>'
            })
        }

    })

    // $(document).on("change", ".number_of_question", function() {
    //     var sum = 0;
    //     $(".number_of_question").each(function(){
    //         sum += +$(this).val();
    //     });
    //    let total_question = $(".total").val(sum);
    //     console.log(total_question)
    // });

//     $(".number_of_question").on("blur", function(){
//     var sum=0;
//     $(".number_of_question").each(function(){
//         if($(this).val() != "")
//           sum += parseInt($(this).val());   
//     });
    
//     $("#result").html(sum);
//     console.log(sum)
// });

    //add subject
    $('#kk_modal_new_add_subject_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('')

        var arr = $('input[name="number_of_question[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var total = 0;
        for (var i = 0; i < arr.length; i++) {
            total += arr[i] << 0;
        }

        $('input[name="total"]').val(total);

        // console.log(total);
        // console.log(total_question);

        var total_question = $('input[name="total_question"]').val();

        if(total_question >= total){

            var formData = new FormData(this);

            $.ajax({
                type:"POST",
                url: "{{ route('admin.exam-details.store') }}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    //console.log(data);
                    if(data.error){
                        var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                        $('.messages').html(alertBox).show();
                        setTimeout(function() { 
                            $('.messages').html(alertBox).hide();
                        }, 3000);
                        
                    }else{
                    
                        $('#kk_modal_new_add_subject_form')[0].reset();
                        $(".dynamic-row").remove();
                        $('.messages').html('');

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
                            }))
                    }
                }
            });
        }else{
            //alert('Number of question should be less than total question');
            var alertBox = '<div class="alert alert-danger" alert-dismissable">Exam Total Question = '+total_question+'<br> Subject total Question = '+ total+  '<br> Subject total Question should be less or equal to Exam Total Question </div>';
            $('.messages').html(alertBox).show();
            setTimeout(function() { 
                $('.messages').html(alertBox).hide();
            }, 7000);
            // toastr.error('Exam Total Question = '+total_question+'<br> Number of Question = '+ total+  '<br> Number of question should be less than or equal total exam Question');
        }
      
    })

   

</script>
@endpush