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
        <form id="kk_modal_new_samprotik_form" class="form"  method="POST" action="{{ route('admin.question.store') }}" enctype="multipart/form-data">
            <div class="messages"></div>
            {{-- csrf token  --}}
            @csrf
            <!--begin::Heading-->
            <div class="mb-13 text-center">
                <!--begin::Title-->
                <h1 class="mb-3 mt-3">Preview Before Confirm</h1>
                <!--end::Title-->
               
            </div>
            <!--end::Heading-->
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
                                    <input type="text" class="form-control form-control-solid mb-2 @error('title') is-invalid @enderror" placeholder="Enter passage title" name="title" value="{{ $myForm['title'] }}"/>

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
           
            @for($i = 0; $i < $myForm['number']; $i++)
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
                                        <span class="required text-uppercase fw-bolder" style="font-size: 16px">Question : {{ $i+1 }} </span>
                                    </label>
                                    <input type="hidden" name="type" value="{{ $myForm['type'] }}">
                                    <input type="hidden" name="sub_category" value="{{ $myForm['sub_category'] }}">
                                    <input type="hidden" name="main_category" value="{{ $myForm['main_category'] }}">
                                    <input type="hidden" name="subject" value="{{ $myForm['subject'] }}">
                                    <input type="hidden" name="year" value="{{ $myForm['year'] }}">
            
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
                            <div class="row g-9 mb-8">
                                <!--begin::Col-->
                                {{-- @for($o = 0; $o < 4; $o++)  --}}
                                <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Option : 1 </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="1"
                                        @if($myForm['answer'][$i] == '1') checked @endif
                                        >
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                        name="option_1[]"  value="{{ $myForm['option_1'][$i] }}"/>
                                    </div>
                                
                                    @if($myForm['type'] == 'image')
                                    <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="image[]" multiple>
                                    @endif
                                </div>    
                                <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Option : 2 </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="2"
                                        @if($myForm['answer'][$i] == '2') checked @endif
                                        >
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                        name="option_2[]"  value="{{ $myForm['option_2'][$i] }}"/>
                                    </div>
                                
                                    @if($myForm['type'] == 'image')
                                    <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="image[]" multiple>
                                    @endif
                                </div>    
                                <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Option : 3 </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="3"
                                        @if($myForm['answer'][$i] == '3') checked @endif
                                        >
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                        name="option_3[]"  value="{{ $myForm['option_3'][$i] }}"/>
                                    </div>
                                
                                    @if($myForm['type'] == 'image')
                                    <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="image[]" multiple>
                                    @endif
                                </div>    
                                <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Option : 4 </span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="answer[{{ $i }}]"  value="4"
                                        @if($myForm['answer'][$i] == '4') checked @endif
                                        >
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter option"
                                        name="option_4[]"  value="{{ $myForm['option_4'][$i] }}"/>
                                    </div>
                                
                                    @if($myForm['type'] == 'image')
                                    <input type="file" class="form-control-file mt-2" id="exampleInputFile" name="image[]" multiple>
                                    @endif
                                </div>    
                                {{-- @endfor --}}
                            </div>
                        </div> 
                    </div>
                    <!--end::Input group-->
                </div>
            </div>
            @endfor
            <!--begin::Actions-->
            <div class="text-center d-flex justify-content-end py-4 px-4" >
                <button type="submit" class="btn btn-primary" style="padding: 10px 70px">
                    <span class="indicator-label">Confirm</span>
                </button>
            </div>
        </form>
    </div>
</div>
<!---end::Post -->
@endsection

@push('script')
    <script type="text/javascript">

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
      
    </script>
@endpush
