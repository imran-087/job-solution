@extends('admin.layout.app')
@section('title', 'Written-Question')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
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
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Create</li>
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
            <div class="card" style="margin-top:20px">
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_written_question_form" class="form"  method="" action="">
                        <div class="messages"></div> 
                        {{-- csrf token  --}}
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3 mt-3">Written Question</h1>
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
                                <label class="required fs-6 fw-bold mb-2">Select Main Category</label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select main category" name="main_category" id="main_category">
                                    <option value="">Choose ...</option>

                                    @foreach ($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                    @endforeach

                                </select>
                                <div class="help-block with-errors main_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Category</label>
                                <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select category" name="category" id="category">


                                </select>
                                <div class="help-block with-errors category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                                <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select sub category" name="sub_category" id="sub_category">


                                </select>
                                <div class="help-block with-errors sub_category-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Subject</label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select subject" name="subject" id="subject">


                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-2 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Year</label>
                                <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select year" name="year" id="year">
                                    <option value="">Choose ...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach

                                </select>
                               <div class="help-block with-errors year-error"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-8 fv-row">
                                <label class="fs-6 fw-bold mb-2">Select Question Instruction </label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select Question Instruction" name="instruction" id="instruction">
                                   
                                </select>
                               
                            </div>
                            <!--end:Col-->
                            <!--begin::Col-->
                            <div class="col-md-2  fv-row" >
                                <label class="fs-6 fw-bold mb-2 required">Number of Input</label>
                                <!--begin:Form-->
                                <div id="kk_modal_new_samprotik_form" class="form me-4">
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter number" name="number" id="number" />
                                </div>
                                <!--end:Form-->
                            </div>
                            <!--end::Col-->
                            
                        </div>

                        <!--start::written question input--> 
                        <div id="written"></div>     
                        <!--end::written question input--> 
                        
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#kk_modal_new_written_question_form').on("keypress", function(event) {
            if (event.which == 13 && !event.shiftKey) {
                event.preventDefault();
                //console.log('here')
                var number = $('#number').val();
               
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/question/written-question/create')}}",
                    data: {
                        number: number,
                    },
                    //If result found, this funtion will be called.
                    success: function(data) {
                        $('#written').html(data.html)
                    }
                });

            }
        });

        //get question instruction
        $('#subject').on('change', function () {
            var subCategoryID =  $("#sub_category").find(':selected').val();
            var subjectID = $(this).val();
            console.log(subCategoryID);
            console.log(subjectID)
            if (subCategoryID && subjectID) {
                $.ajax({
                    url: "{{ url('admin/question/written-question/get-instruction')}}",
                    type: "GET",
                    data: {
                        sub_category : subCategoryID,
                        subject : subjectID
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $('#instruction').empty();
                            $('#instruction').append('<option value="">Choose...</option>');
                            $('#instruction').append('<option value="none">No instruction</option>');
                            $.each(data, function (key, instruction) {
                                $('select[name="instruction"]').append(
                                '<option value="' + instruction.id + '">' + instruction.question_no   + ' - ' + instruction.question   + '</option>');
                            });
                        }
                            else {
                            $('#instruction').empty(); 
                        }
                    }
                });
            } else {
                $('#instruction').empty();
            }
        });
    })

    //save question
    $('#kk_modal_new_written_question_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('')
        $('.indicator-label').hide()
        $('.indicator-progress').show()
        $('#kk_modal_new_service_submit').attr('disabled','true')

        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ route('admin.written.store') }}",
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
                    $('#kk_modal_new_written_question_form')[0].reset();
                   
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

    //answer field show hidden
    $(document).on('change', '.instruction', function(){
        let val = $(this).val();
        console.log(val);
        if(val == 'yes'){
           $(this).closest('div').find('.written-answer').toggleClass('d-none');
        }
       
    })

    // add row
    $(document).on('click', '.addRow', function() {
        var html = '';
        html += ' <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">'
        html += '<div class="card-body pt-4 " style="padding-bottom: 0px !important">'

        html += '    <div class="row g-9 pb-4">'

        html += '       <div style="" class="mb-5"> '
        html += ' <div class="row">'
        html += '  <div class="col-md-1">'

        html += '<div class="d-flex flex-column mb-8 fv-row">'

        html += '       <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '    <div class="required">QN</div>'
        html += '      </label>'

        html += '       <input type="text" class="form-control form-control-solid" placeholder="Q.No." name="question_no[]" />'
        html += '              </div>'

        html += '         </div>'
        html += '        <div class="col-md-9">'

        html += '           <div class="d-flex flex-column mb-8 fv-row">'

        html += '               <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '                    <div class="required">Question </div>'
        html += '               </label>'

        html += '               <input type="text" class="form-control form-control-solid" placeholder="Enter Question" name="question[]" /> '
        html += '           </div>'

        html += '        </div>'
        html += '       <div class="col-md-1">'

        html += '            <div class="d-flex flex-column mb-8 fv-row">'

        html += '                <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '                    <div class="">OR</div>'
        html += '                </label>'
        html += '               <input type="text" class="form-control form-control-solid" placeholder="অথবা" name="question_or[]" />'
        html += '           </div>'
        html += '       </div>'
        html += '       <div class="col-md-1">'

        html += '            <div class="d-flex flex-column mb-8 fv-row">'

        html += '                <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '                    <div class="required">Mark</div>'
        html += '                </label>'
        html += '               <input type="text" class="form-control form-control-solid" placeholder="5/10" name="mark[]" />'
        html += '           </div>'
        html += '       </div>'
        html += '   </div>'
        html += '    <div class="d-flex flex-column mb-8 fv-row">'

        html += '        <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
        html += '             <span class="required fw-bolder">answer</span>'
        html += '         </label>'

        html += '        <textarea type="text" class="form-control form-control-solid h-100px"  placeholder="Enter answer" name="answer[]" > </textarea>'
        html += '        <div class="help-block with-errors answer-error"></div>'
        html += '     </div>'
        html += '   </div>'
        html += '   </div>'
        html += '   </div>'
        html += '   </div>'
        $('.newRow').append(html);

    });

</script>
@endpush