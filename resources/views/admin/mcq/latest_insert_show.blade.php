@extends('admin.layout.app')
@section('title', 'Latest-Input-Question')

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
                    <li class="breadcrumb-item text-muted">Latest Input</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">McQ</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid col-12"  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="card card-bordered mb-5 py-2 px-2 ">
                <div class="card-header d-flex flex-column align-items-center justify-content-center mb-10">
                    <h4 class="fw-bolder fs-4 text-capitalize py-2 px-2">{{ $sub_category }}</h4>
                    <h3 class="">বিষয় ঃ {{$subject->name}}</h3>
                </div>
                @php $serial_number = 1 ; @endphp
                @isset($questions)
                    @if($passage != null)
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-justify px-3 text-gray-700  mb-0">
                                <span ><span class="fs-3 fw-bold" style="color: black">Read the passage and answer the following question :</span><br> {!! $passage->passage !!} </span>
                            </h5> 
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        @foreach($questions as $key => $question)
                            <div class="col-md-6 ">
                                <div class="card card-bordered mb-5">
                                    <div class="card-header">
                                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                                <span > {{ $serial_number }}. {{$question->question}} </span>
                                        </h3>
                                        
                                    
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <a href="{{route('admin.question.edit', ['id' => $question->id, 'ques' => $question->slug])}}" target="_blank" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold edit me-1" ><i class="fas fa-edit"></i></a>
                                            <!--end::Menu--> 

                                            <!--begin::Menu-->
                                            <a href="javascript:;" data-id="{{ $question->id }}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold delete"><i class="fas fa-trash"></i></a>
                                            <!--end::Menu--> 
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="row"  style="font-size: 16px">
                                            {{-- question image start--}}
                                            <div class="text-center mb-3">
                                                @if($question->question_type == 'image')
                                                @isset($question->question_option->image_question)
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_question) }}" class="h-150 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                @endisset
                                                @endif
                                            </div>
                                            {{-- question image end  --}}

                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " > 
                                                <span >
                                                    @if($question->question_option->answer == 1)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                </span> {{$question->question_option->option_1 }}</p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " > 
                                                <span >
                                                    @if($question->question_option->answer == 2)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                </span> {{$question->question_option->option_2}}</p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold"> 
                                                <span >
                                                    @if($question->question_option->answer == 3)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{$question->question_option->option_3 }}</p>
                                                    @if($question->question_type == 'image')
                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                    @endif
                                            </div>
                                            @isset($question->question_option->option_4)
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " > 
                                                    <span >
                                                    @if($question->question_option->answer == 4)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{$question->question_option->option_4 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            @endisset
                                            @isset($question->question_option->option_5)
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " > 
                                                    <span >
                                                    @if($question->question_option->answer == 5)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{$question->question_option->option_5 }}
                                                </p>
                                                @if($question->question_type == 'image')
                                                <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset($question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            @endisset
                                        </div>

                                        <div class="row">
                                            <!--end::Input group-->
                                            @if($question->descriptions->count() > 0)
                                                @foreach($question->descriptions as $description)
                                                <span class="fw-bolder fs-6">Description:</span><p class="text-gray-800 fw-bold ml-4 cursor-pointer update-des" data-description_id={{ $description->id }} style="text-align: justify">{!! $description->description !!}</p>
                                                @endforeach
                                            @endif

                                            <!-- start: update description -->
                                            <div class="d-flex flex-column mt-2 fv-row update-form">
                                                
                                            </div>
                                            <!-- end: description update -->

                                        
                                            <!-- Start: description add -->
                                            <span class="add-description cursor-pointer" data-question_id="{{ $question->id }}"><i class="fas fa-plus-circle fa-2xl"></i> <span class="fw-bolder fs-5">Description</span> </span>
                                            <div class="d-flex flex-column mt-2 fv-row add-des-form">
                                                
                                            </div>
                                            <!-- end: description add -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $serial_number++ ; @endphp
                        @endforeach
                    </div>
                @endisset
               
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

</div>
@endsection

@push('script')


<script type="text/javascript">

    //show description form
    $(document).on('click', '.add-description', function(){
        $('div.update-form').html('');
        $('.update-des').show();
        
        var question_id = $(this).data('question_id');
        //console.log(question_id);
        var html = '';

        html += '<input type="hidden" name="question_id" value="'+ question_id +'"';
        html += '<span id="kk_add_description_form" class="form">';
        html +=    '<div class="col-md-12 mb-5">';   
        html +=          '<textarea name="description" id="textareaDescription" class="form-control form-control-solid h-100px"></textarea>';
        html +=     '</div>';
        html +=      '<div class="d-flex justify-content-end">';
        html +=            '<button type="submit" id="kk_add_description" class="btn btn-primary btn-sm">add</button>';
        html +=       '</div>';
        html +=   '</span>';
        html +=   '<button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_add_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>';
       
        $(this).closest('div').find('.add-des-form').html(html);
    })

    //cancel button of add
    $(document).on('click', '.kk_modal_new_add_cancel', function(){
        $(this).parent('div.add-des-form').html('');
        
    })

    //add description --save
    $(document).on('click', '#kk_add_description', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')

        var thisaddbtn = $(this);

        var question_id = $('input[name=question_id]').val();
        var description = $('#textareaDescription').val();
        // console.log(question_id);
        // console.log(description);

        $.ajax({
            type:"POST",
            url: "{{ url('admin/description/question-description/store')}}",
            data:{
                "_token": "{{ csrf_token() }}",
                question : question_id,
                description : description
            },
           dataType: "json",
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
                    toastr.success(data.message);
                    thisaddbtn.parent().parent("div").find('.add-des-form').html('');
                    location.reload();
                }

            }
        });
    })


    //show update description form
    $(document).on('click', '.update-des', function(){
        $(this).hide();
        $('div.add-des-form').html('');

        var description_id = $(this).data('description_id');
        var description = $(this).text();
        // console.log(description_id);
        // console.log(description);

        var html = '';

        html += '<input type="hidden" name="description_id" value="'+ description_id +'"';
        html += '<span id="kk_update_description_form" class="form">';
        html +=    '<div class="col-md-12 mb-5">';   
        html +=          '<textarea name="description" id="textareaDescription" class="form-control form-control-solid h-100px">'+ description +'</textarea>';
        html +=     '</div>';
        html +=      '<div class="d-flex justify-content-end">';
        html +=            '<button type="submit" id="kk_update_description" class="btn btn-primary btn-sm">update</button>';
        html +=       '</div>';
        html +=   '</span>';
        html +=   '<button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_update_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>';
       

        $(this).closest('div').find('.update-form').html(html);
    })

    //cancel button of update
    $(document).on('click', '.kk_modal_new_update_cancel', function(){
        $(this).parent('div.update-form').html('');
        $('.update-des').show();
    })
   

    //update description --save
    $(document).on('click', '#kk_update_description', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')

        var thisaddbtn = $(this);

        var description_id = $('input[name=description_id]').val();
        var description = $('#textareaDescription').val();
        // console.log(description_id);
        // console.log(description);
      
        $.ajax({
            type:"POST",
            url: "{{ url('admin/question-description/update')}}",
            data:{
                "_token": "{{ csrf_token() }}",
                description_id : description_id,
                description : description
            },
           dataType: "json",
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
                    toastr.success(data.message);
                    thisaddbtn.parent().parent("div").find('.update-form').html('');
                    thisaddbtn.parent().parent("div").find('.update-des').show();
                    location.reload();
                }

            }
        });
    })

    //delete Question
     $(document).on('click', '.delete', function(){
        var id = $(this).data('id');

        Swal.fire({
            text: "Are you sure you want delete this?",
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
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/question/delete') }}"+'/'+id,
                    data: {},
                    success: function (res)
                    {
                        if(res.success){
                            Swal.fire({
                                text: res.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                               location.reload();
                            }))
                        }else{
                            toastr.error(res.message);
                        }
                    }
                });

            }else{ //if cancel
                Swal.fire({
                    text: "Item has not been deleted",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                })
            }

        }))
    })

</script>
@endpush


