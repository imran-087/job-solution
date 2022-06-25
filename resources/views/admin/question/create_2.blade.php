@extends('admin.layout.app')
@section('title', 'MCQ-Question')

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
                <h4 class="badge badge-light me-2">Total input by {{Auth::user()->name}} : <span class="text-danger fs-5">{{$total_input_by_auth_user->count()}} </span></h4>
                <!--begin::Button-->
                {{-- <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a> --}}
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid col-12  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_mcq_input_generator_form" class="form"  >
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf

                        <!--begin::Input group-->
                        <div class="row g-9 pb-4">
                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row offset-2">
                                {{-- <label class="required fs-6 fw-bold mb-2">Question Type</label> --}}
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="" name="type" id="type">
                                    <option value="mcq" selected>MCQ</option>
                                    <option value="image">Image MCQ</option>
                                    <option value="passage">Passage MCQ</option>
                                </select>

                            </div>
                            <!--end:Col-->
                            <!--begin::Col-->
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-xs-6 fv-row ">
                                {{-- <label class="required fs-6 fw-bold mb-2">Question Type</label> --}}
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="" name="option" id="option">
                                    <option value="4" selected>4</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                </select>

                            </div>
                            <!--end:Col-->

                            <!--begin::Col-->
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 fv-row">

                                <input type="text" class="form-control form-control-solid" placeholder="Number of Question"
                                    name="number" id="number" />
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Input group-->
                    </form>
                    <!--end:Form-->

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card" style="margin-top:20px">
                <!--begin::Card body-->
                <div class="card-body pt-4 " style="padding-bottom: 0px !important">
                    <!--begin:Form-->
                    <form id="kk_modal_new_mcq_form" class="form"  method="POST" action="{{ route('admin.question.preview') }}" enctype="multipart/form-data">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3 mt-3">MCQ Question Input</h1>
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
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Sub Category</span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" type="text" name=""  value="{{ $sub_category->name }}" disabled>
                                <input type="hidden" name="sub_category"  value="{{ $sub_category->id }}" >
                                <input type="hidden" name="main_category"  value="{{ $main_category }}" >
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Select Subject</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-hide-search="true" name="subject"
                                    id="subject" required>
                                    @isset($subjects)
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }} &nbsp;&nbsp; --- &nbsp;&nbsp; <span style="margin-left:10px; !important"> {{ $subject->sub_category->name ?? $subject->main_category->name  }} </span></option>
                                    
                                    @endforeach
                                    @endisset
                                </select>
                                <div class="help-block with-errors subject-error"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                        <!--start::mcq question input-->
                        <div id="input"></div>
                        <!--end::mcq question input-->

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
    $(document).ready(function(){
        $('#kk_modal_new_mcq_input_generator_form').on( "keypress", function(event) {
            if (event.which == 13 && !event.shiftKey) {
                event.preventDefault();
                //console.log('here')
                var number = $('#number').val();
                var type =  $("#type").find(':selected').val();
                var option =  $("#option").find(':selected').val();

                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/question/question-input')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        number : number,
                        type : type,
                        option : option,
                    },
                    //If result found, this funtion will be called.
                    success: function(data) {
                        $('#input').html(data.html)
                    }
                });

            }
        });
    })

    //save question
    // $('#kk_modal_new_mcq_form').on('submit',function(e){
    //     e.preventDefault()
    //     $('.with-errors').text('')
    //     $('.indicator-label').hide()
    //     $('.indicator-progress').show()
    //     $('#kk_modal_new_service_submit').attr('disabled','true')

    //     var formData = new FormData(this);

    //     var type = $('#type').val();
    //     if(type == 'passage'){
    //         formData.append('passage', myEditor.getData());
    //     }

    //     $.ajax({
    //         type:"POST",
    //         url: "{{ route('admin.question.store') }}",
    //         data:formData,
    //         cache:false,
    //         contentType: false,
    //         processData: false,
    //         success:function(data){
    //             if(data.success ==  false || data.success ==  "false"){
    //                 var arr = Object.keys(data.errors);
    //                 var arr_val = Object.values(data.errors);
    //                 for(var i= 0;i < arr.length;i++){
    //                 $('.'+arr[i]+'-error').text(arr_val[i][0])
    //                 }
    //             }else if(data.error || data.error == 'true'){
    //                 var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
    //                 $('#kk_modal_new_category_form').find('.messages').html(alertBox).show();
    //             }else{
    //                 // empty the form
    //                 $('#kk_modal_new_mcq_form')[0].reset();

    //                 Swal.fire({
    //                         text: data.message,
    //                         icon: "success",
    //                         buttonsStyling: !1,
    //                         confirmButtonText: "{{__('Ok, got it!')}}",
    //                         customClass: {
    //                             confirmButton: "btn fw-bold btn-primary"
    //                         }
    //                     }).then((function () {
    //                         //refresh
    //                         location.reload();
    //                     }))
    //             }

    //             $('.indicator-label').show()
    //             $('.indicator-progress').hide()
    //             $('#kk_modal_new_service_submit').removeAttr('disabled')

    //         }
    //     });

    // })

</script>
@endpush
