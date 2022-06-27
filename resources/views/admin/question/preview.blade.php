@extends('admin.layout.app')
@section('title', 'Question Preview')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex  flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Question</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Preview Question</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin:Form-->
        <form id="kk_modal_new_question_form" class="form"  method="POST" action="{{ route('admin.question.store') }} " enctype="multipart/form-data">
            <div class="messages"></div>
            {{-- csrf token  --}}
            @csrf
            <div class="card">
                <div class="card-body">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3 mt-3">Preview Question Input</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Recheck All The Field and Submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <input type="hidden" name="number" value="{{ $myForm['number'] }}">
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Main Category</label>
                            <select class="form-select form-select-solid " data-control="select2"
                                data-hide-search="true" data-placeholder="Select main category" name="main_category"
                                id="main_category" >

                                @foreach ($main_categories as $main_category)
                                <option value="{{ $main_category->id }}"
                                    @if($main_category->id == $myForm['main_category']) Selected @endif
                                    >
                                    {{ $main_category->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors main_category-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Category</label>
                            <select class="form-select form-select-solid " data-control="select2"
                                data-hide-search="true" data-placeholder="Select category" name="category"
                                id="category" >

                                {{-- <option value="{{ $myForm['category'] }}">{{ getCategory($myForm['category'])->name }}</option> --}}
                            </select>
                            <div class="help-block with-errors catgory-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                            <select class="form-select form-select-solid " data-control="select2"
                                data-hide-search="true" data-placeholder="Select sub category" name="sub_category"
                                id="sub_category" >

                                <option value="{{ $myForm['sub_category'] }}">{{ getSubCategory($myForm['sub_category'])->name }}</option>
                            </select>
                            <div class="help-block with-errors sub_category-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Subject</label>
                            <select class="form-select form-select-solid" data-control="select2"
                                data-hide-search="true" data-placeholder="Select subject" name="subject"
                                id="subject" >

                                <option value="{{ $myForm['subject'] }}">{{ getSubject($myForm['subject'])->name }}</option>
                            </select>
                            <div class="help-block with-errors subject-error"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group for year-->
                    {{-- <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-2 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Year</label>
                            <select class="form-select form-select-solid " data-control="select2"
                                data-hide-search="true" data-placeholder="Select year" name="year"
                                id="year" >
                                <option value="">{{ $myForm['year'] }}</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->id }}"
                                    @if($year->id == $myForm['year']) Selected @endif
                                    >
                                {{ $year->year }}</option>
                                @endforeach

                            </select>
                            <div class="help-block with-errors year-error"></div>
                        </div>
                        <!--end::Col-->
                    </div> --}}
                    <!--end::Input group-->
                </div>
                <!--end::Heading-->
            </div>

            @if($myForm['type'] == 'passage')
            <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:5px">
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin::Input group-->
                    <div class="row g-9 pb-4">
                        <div style="" class="mb-5">
                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required text-uppercase fw-bolder" style="font-size: 16px">Passage </span>
                                    </label>
                                    <input type="hidden" name="type" value="{{ $myForm['type'] }}">
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-2 @error('title') is-invalid @enderror" placeholder="Enter passage title" name="title" value="{{ $myForm['title'] ?? '' }}"/>

                                    <textarea type="text" id="kt_docs_ckeditor_classic" class="form-control form-control-solid h-100px @error('passage') is-invalid @enderror" placeholder="Enter passage" name="passage" >{{ $myForm['passage'] }}</textarea>

                                    @error('passage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- end: col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="card" style="margin:20px 0px !important;">
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    @for($i = 0; $i < $count_question; $i++)
                    <div class="card "  style="margin-top:20px !important; border:7px solid #F2F5F7;  border-radius:5px; padding:5px">
                        <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                            <!--begin::Input group-->
                            <div class="row g-9 pb-4">
                                <div style="" class="mb-5">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">
                                        <input type="hidden" name="type" value="{{ $myForm['type'] }}">
                                        <input type="hidden" name="total_question" value="{{ $count_question }}">
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required text-uppercase fw-bolder" style="font-size: 16px">Question : {{ $i+1 }} </span>
                                            </label>

                                            <!--end::Label-->

                                            <input type="text" class="form-control form-control-solid @error('question.*') is-invalid @enderror" placeholder="Enter Question" name="question[]" value="{{ $myForm['question'][$i] }}"/>
                                            @if($myForm['type'] == 'image')
                                            <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="question_image[]" multiple>
                                            @endif
                                            @error('question.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- end: col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9">
                                        <!--begin::Col-->
                                        {{-- @for($o = 0; $o < 4; $o++)  --}}
                                        <div class="col-md-12 fv-row">
                                            <div class="d-flex align-items-center justify-content-center">

                                                <input class="form-check-input me-3 " type="radio" name="answer[{{ $i }}]"  value="1"
                                                @if( isset($myForm['answer'][$i]) )
                                                    @if($myForm['answer'][$i] == '1') checked @endif
                                                @endif
                                                >

                                                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                name="option_1[]"  value="{{ $myForm['option_1'][$i] ?? '' }}"/>
                                            </div>
                                            {{-- @if($myForm['type'] == 'image')
                                            <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="image[]" multiple>
                                            @endif --}}
                                        </div>
                                        <div class="col-md-12 fv-row ">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input class="form-check-input me-3 " type="radio" name="answer[{{ $i }}]"  value="2"
                                                @if( isset($myForm['answer'][$i]) )
                                                    @if($myForm['answer'][$i] == '2') checked @endif
                                                @endif
                                                >
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                name="option_2[]"  value="{{ $myForm['option_2'][$i] ?? '' }}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 fv-row">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input class="form-check-input me-3 " type="radio" name="answer[{{ $i }}]"  value="3"
                                                @if( isset($myForm['answer'][$i]) )
                                                    @if($myForm['answer'][$i] == '3') checked @endif
                                                @endif
                                                >
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                name="option_3[]"  value="{{ $myForm['option_3'][$i] ?? '' }}"/>
                                            </div>
                                        </div>
                                        @if(isset($myForm['option_4']))
                                        <div class="col-md-12 fv-row">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input class="form-check-input me-3 " type="radio" name="answer[{{ $i }}]"  value="4"
                                                @if( isset($myForm['answer'][$i]) )
                                                    @if($myForm['answer'][$i] == '4') checked @endif
                                                @endif
                                                >
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                name="option_4[]"  value="{{ $myForm['option_4'][$i] ?? '' }}"/>
                                            </div>
                                        </div>
                                        @endif
                                        @if(isset($myForm['option_5']))
                                        <div class="col-md-12 fv-row">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input class="form-check-input me-3 " type="radio" name="answer[{{ $i }}]"  value="5"
                                                @if( isset($myForm['answer'][$i]) )
                                                    @if($myForm['answer'][$i] == '5') checked @endif
                                                @endif
                                                >
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                                name="option_5[]"  value="{{ $myForm['option_5'][$i] ?? '' }}"/>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                    <!--begin::Actions-->
                    <div class="alert alert-danger mt-5 fs-5 text-capitalize text-center fw-bolder" role="alert">
                        You are not answered all the Question. Please, fill the answer field first & click confirm.
                    </div>

                    <div class="text-center d-flex justify-content-end py-4 px-4" >
                        <button type="submit" class="btn btn-primary fs-5" id="kk_modal_new_service_submit" style="padding: 10px 60px">
                            <span class="indicator-label">Confirm</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!---end::Post -->
@endsection

@push('script')

    <script type="text/javascript">
        $(document).ready(function(){

            var question_answer_length = ( $('input:radio:checked').length );
            var total_question = $('input[name=total_question]').val();

            if(total_question == question_answer_length){
                $(".alert-danger").hide();
            }else{
                $('#kk_modal_new_service_submit').attr('disabled' , true);
            }


            $("input[type=radio]").on("change", function () {
                var question_answer_length = ( $('input:radio:checked').length );
                var total_question = $('input[name=total_question]').val();

                if(total_question != question_answer_length){
                    $('#kk_modal_new_service_submit').attr('disabled' , true);
                }else{
                    $('.alert-danger').hide();
                    $('#kk_modal_new_service_submit').attr('disabled' , false);
                }

            })

        })
    </script>

    {{-- <script type="text/javascript">
    $(document).ready(function(){
        //edit
        $('.edit').on('click', function(){
            var id = $(this).data('id')
            $.ajax({
                type:"GET",
                url: "{{ url('admin/question/edit-question/modal')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    $("#edited_question_view_modal").html(data.html);
                    $("#kk_modal_show_question").modal('show');
                }
            });
        })

        //cancel button
        $(document).on('click', '#kk_modal_new_service_cancel', function(){

            $("#kk_modal_show_question").modal('hide');
        })

        //update
        $(document).on('submit', '#kk_modal_new_question_form', function(e){
            e.preventDefault()
            console.log('here')
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('admin/question/edit-question/update')}}",
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
                            }).then((function () {
                                //refresh page
                                location.reload()
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
            });
        })

        //confirm submission
        $("#confirm_submission").on('click', function(){
            var val = $(this).data('text')
            $.ajax({
                type:"GET",
                url: "{{ url('admin/question/store')}}"+'/'+val,
                dataType: 'json',
                success:function(data){
                    toastr.success(data.message);
                    window.setTimeout(function(){
                        window.location = data.redirect_url;
                    }, 1000);

                }
            });

        })
    })
    </script> --}}
@endpush
