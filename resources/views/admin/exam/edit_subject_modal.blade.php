<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-850px">
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
            <form id="kk_modal_update_subject_form" class="form" >
                {{-- csrf token  --}}
                @csrf
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3 mt-3">Update Exam Subject</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Fill up the form and submit
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                
                {{-- hidden field  --}}
                <input type="hidden" name="total_exam_question" value="{{ $exam->number_of_question }}">
                <input type="hidden" name="total">
                <input type="hidden" name="exam_id" id="this_exam_id" value="{{ $exam->id }}">

                <div class="messages col-md-8 offset-2 mb-13"></div>
                <!--begin::Input group-->
                <div class="row g-9 mb-8">
                    <!--begin::Col-->
                    <div class="col-md-12 fv-row">
                        <label class="required fs-6 fw-bold mb-2">Exam Name</label>
                        <input type="text" class="form-control form-control-solid" name="exam" id="exam_name" value="{{ $exam->name }}" disabled>
                        
                    </div>
                    <!--end::Col-->
                </div>
                @foreach ($exam_details as $exam)
                <!--begin::Input group-->
                <div class="row g-9 mb-8">
                    <!--begin::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="required fs-6 fw-bold mb-2">Select subject</label>
                        <select class="form-select form-select-solid " data-control="select2"
                            data-hide-search="true" data-placeholder="Select subject" name="subject_id[]"
                            id="subject" required {{ collect($exam->question_ids)->count() == $exam->number_of_question ? 'disabled' : '' }}>
                            @foreach($subject as $data)
                            <option value="{{ $data->id }}"
                                @if($data->id == $exam->subject_id) selected @endif
                                >{{ $data->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors subject-error"></div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4  fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Number of Ques. in this subject</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid number_of_ques"  placeholder="Number of Question" name="number_of_question[]" value="{{ $exam->number_of_question }}"
                        {{ collect($exam->question_ids)->count() == $exam->number_of_question ? 'disabled' : '' }}/>
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
                        <button class="btn btn-info btn-icon btn-sm editSubjectAddRow" type="button"
                        {{ collect($exam->question_ids)->count() == $exam->number_of_question ? 'disabled' : '' }}><i class="fas fa-plus"></i></button> 
                    </div>
                    <!-- end: col-->
                    <!--begin::Col-->
                    <div class="col-md-3  fv-row" id=total_exam_question>
                        
                    </div>
                    <!-- end: col-->
                    
                </div>
                <!--end::Input group-->
                @endforeach

                <!-- append dynamic input field-->
                <div  class="newRow"></div>
                <!-- append dynamic input field -->
                
                <!--begin::Actions-->
                <div class="text-center d-flex justify-content-end py-4 px-4" >
                    <button type="submit" id="kk_modal_update_service_submit" class="btn btn-primary" style="padding: 10px 70px"
                    {{ collect($exam->question_ids)->count() == $exam->number_of_question ? 'disabled' : '' }}>
                        <span class="indicator-label">Submit</span>
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


<script type="text/javascript">

    //getting subject for select input field
    function gettingSelectInputSubject(id)
    {
        $.ajax({
            type:"GET",
            url: "{{ url('/admin/exam-details/get-subject')}}"+'/'+id,
            dataType: 'json',
            success:function(data){
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
                    //total number of question
                    $('input[name="total_exam_question"]').val(data.exam.number_of_question);
                
                    var val = '<label class="d-flex align-items-center fs-6 fw-bold mb-2"><span class="required">Exam Total Question</span> </label>'
                    val += '<span class="badge badge-primary badge-lg"><span id=result_> 0  </span> / ' + data.exam.number_of_question + '</span>'
                            
                    $('#total_exam_question').html(val)
                } else {
                    $('#subject').empty(); 
                }
            }
        });
    }

    //disabled submit button
    // $('#kk_modal_update_service_submit').attr('disabled', true);

    //count input number of question value
    $(document).on('keyup', ".number_of_ques",function () {
        var input_total = 0;
    
        $('.number_of_ques').each(function(){
            input_total += parseFloat($(this).val());
        })  

        $("#result_").html(input_total);

        var total_question = $('input[name="total_exam_question"]').val();

        if(input_total == total_question) {

            $('#kk_modal_update_service_submit').attr('disabled' , false);
        }
    
        else{
            $('#kk_modal_update_service_submit').attr('disabled' , true);
        }

        if ( input_total > total_question){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Number of input question must be equal to Total Question.',
                footer: '<span class="text-danger">Pls reduce Num of Ques !!!</span>'
            })
        }

    })

    //substruction
    function substructTotalQuestion(number_of_question)
    {
        let total_question = $('#result_').text();
        let input_total = parseInt(total_question) - parseInt(number_of_question);
        
        $("#result_").html(input_total);
    }


    //add new input field
    $(document).on('click', '.editSubjectAddRow', function(e) {
        e.preventDefault();

        //get exam id
        var id = $('#this_exam_id').val();
        console.log('here=' +id);
        //getting subject for this exam
        gettingSelectInputSubject(id);

        var html = '';
        html += '<div class="row g-9 mb-8 dynamic-row">'
            
        html += '    <div class="col-md-4  fv-row">'
        html += '           <label class="required fs-6 fw-bold mb-2">Select subject</label>'
        html += '           <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select subject" name="subject_id[]" id="subject" required>'
        html += '           </select>'
        html += '           <div class="help-block with-errors subject-error"></div>'
        html += '     </div>'
        html += '     <div class="col-md-4  fv-row">'
        html += '         <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '               <span class="required">Number of Ques.</span>'
        html += '         </label>'
        html += '         <input type="text" class="form-control form-control-solid number_of_ques" placeholder="Number of Question" name="number_of_question[]" value="0" />'
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
        let number_of_question = $(this).parent().prev().find('.number_of_ques').val();
        //console.log(number_of_question);
        substructTotalQuestion(number_of_question);
        //$(this).remove();
    });

    //update exam subject
    $('#kk_modal_update_subject_form').on('submit', function(e){
        e.preventDefault()
        $('.with-errors').text('')

        var formData = new FormData(this);
        console.log(formData);

        $.ajax({
            type:"POST",
            url: "{{ route('admin.exam-details.update') }}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                //console.log(data);
                if(data.error){
                    var alertBox = '<div class="alert alert-danger text-center" alert-dismissable">' + data.message + '</div>';
                    $('.messages').html(alertBox).show();
                    setTimeout(function() { 
                        $('.messages').html(alertBox).hide();
                    }, 5000);
                    
                }else{
                
                    $('#kk_modal_update_subject_form')[0].reset();
                    $("#kk_exam_subject_edit_modal").modal('hide');
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
                        //refresh 
                        $('#dataTable').DataTable().ajax.reload();
                    }))
                }
            }
        });
        
    })

</script>
