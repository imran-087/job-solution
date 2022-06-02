@extends('admin.layout.app')
@section('title', 'Samprotik-Question')

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
                    <li class="breadcrumb-item text-muted">Samprotik Question</li>
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
    <div class="post d-flex flex-column-fluid col-12  id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
           <!--begin::Card-->
            <div class="card mb-5">
                <!--begin::Card body-->
                @include('admin.samprotik.menu-bar')
                <!--end::Card body-->
            </div>
            <!--end::Card--> 

            @foreach($questions as $key => $question)
                <div class="col-md-6">
                    <div class="card card-bordered mb-5">
                        <div class="card-header">
                            <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                    <span > {{ $question->id }}. {{$question->question}} </span>
                            </h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <a href="{{route('admin.samprotik.edit', ['id' => $question->id, 'ques' => $question->slug])}}" target="_blank" class="btn btn-sm btn-icon btn-light btn-active-primary me-1 fw-bold edit" ><i class="fas fa-edit"></i></a>
                                <!--end::Menu--> 
                                <!--begin::Menu-->
                                <a href="javascript:;" data-id="{{ $question->id }}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold delete"><i class="fas fa-trash"></i></a>
                                <!--end::Menu--> 
                            
                            </div>
                        
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <span data-question_id=" {{ $question->id }}" class="btn btn-sm btn-light btn-active-color-primary ms-2 get-tag cursor-pointer" title="Click" >Add Tag</span>
                                <div class="tag" style="z-index:999"></div>
                            </div>
                        </div>
                        @if($question->options != '') 
                        <div class="card-body">
                            <div class="row"  style="font-size: 16px">
                                <div class="col-md-6">
                                    <p class="text-gray-800 fw-bold " > 
                                    <span >
                                        @if($question->options['answer'] == 1)
                                        <i class="fas fa-check-circle fa-2xl"></i>
                                        @else
                                        <i class="fas fa-dot-circle fa-2xl"></i>
                                        @endif
                                    </span> {{$question->options['option_1'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-gray-800 fw-bold " > 
                                    <span >
                                        @if($question->options['answer'] == 2)
                                        <i class="fas fa-check-circle fa-2xl"></i>
                                        @else
                                        <i class="fas fa-dot-circle fa-2xl"></i>
                                        @endif
                                    </span> {{$question->options['option_2'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-gray-800 fw-bold " > 
                                    <span >
                                        @if($question->options['answer'] == 3)
                                        <i class="fas fa-check-circle fa-2xl"></i>
                                        @else
                                        <i class="fas fa-dot-circle fa-2xl"></i>
                                        @endif
                                        </span> {{$question->options['option_3'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-gray-800 fw-bold " > 
                                    <span >
                                        @if($question->options['answer'] == 4)
                                        <i class="fas fa-check-circle fa-2xl"></i>
                                        @else
                                        <i class="fas fa-dot-circle fa-2xl"></i>
                                        @endif
                                        </span> {{$question->options['option_4'] }}</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card-body">
                        
                            <div class="row"  style="font-size: 16px">
                            <p class="text-gray-800 fw-bold " > 
                                    <span style="color:green; font-weight:bold">উত্তর:</span> {{$question->answer }}</p>
                            </div>
                        
                            <div class="row">
                                @foreach($question->descriptions as $description) 
                                    <p class="text-gray-800 fw-bold mt-4 ml-4 cursor-pointer update-des " style="text-align: justify"><b>Description:</b> {{ $description->description }}</p>
                                    <div class="d-flex flex-column mt-2 fv-row update-form d-none">
                                        <form id="kk_update_description_form" class="form">
                                            <div class="messages"></div>
                                            {{-- csrf token  --}}
                                            @csrf
                                            <input type="hidden" name="description_id" value="{{ $description->id }}">
                                            <div class="col-md-12 mb-5">
                                                <textarea name="description" class="form-control form-control-solid h-150px">{{ $description->description }}</textarea>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                
                                                <button type="submit" id="kk_modal_new_service_update" class="btn btn-primary btn-sm">update</button>
                                            </div>
                                        </form>
                                        <button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_update_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>
                                    </div>
                                @endforeach

                                <span class="add-description cursor-pointer "><i class="fas fa-plus-circle fa-2xl"></i> <b>Description</b> </span>
                            
                                <div class="d-flex flex-column mt-2 fv-row des-form d-none">
                                    <form id="kk_add_description_form" class="form">
                                        <div class="messages"></div>
                                        {{-- csrf token  --}}
                                        @csrf
                                        <input type="hidden" name="question" value="{{ $question->id }}">
                                        <div class="col-md-12 mb-5">
                                            <textarea name="description" class="form-control form-control-solid h-100px"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary btn-sm">add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                </div>
            @endforeach
           
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection

@push('script')
<script type="text/javascript">
	
    $(document).ready(function(){

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
                    $('#samprotik_ques').html(data.html);
                }
            });
        }
    
    });

    $(document).ready( function(){
        //option filter
        $('#option').change(function(){
            var val = $(this).val();
            //console.log(val);
            $.ajax({
                type: "GET",
                url: "{{ url('admin/question/samprotik/option-filter') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    option: val,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    $("#samprotik_ques").html('');
                    $("#samprotik_ques").append(data.html);
                }
            });
        })

        //date filter
        $('#date-filter').change(function(){
            var val = $(this).val();
            //console.log(val);
            $.ajax({
                type: "GET",
                url: "{{ url('admin/question/samprotik-filter-by-date') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    value: val,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    $("#samprotik_ques").html('');
                    $("#samprotik_ques").append(data.html);
                }
            })
        })

        //category
        $('#category').change(function(){
            var val = $(this).val();
            //console.log(val);
            $.ajax({
                type: "GET",
                url: "{{ url('admin/question/samprotik-filter-category') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    category: val,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    $("#samprotik_ques").html('');
                    $("#samprotik_ques").append(data.html);
                }
            });
        }) 
    })

    //show description form
    $(document).on('dblclick', '.add-description', function(){
        $(this).closest('div').find('.des-form').toggleClass('d-none');
    })


    //add description --save
    $(document).on('submit', '#kk_add_description_form', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')
     
        var thisaddbtn = $(this);
        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('admin/samprotik-description/store')}}",
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
                    toastr.success(data.message);
                    thisaddbtn.parent().parent("div").find('.des-form').addClass('d-none');
                    location.reload();
                }

            }
        });
    })

    //show update description form
    $(document).on('dblclick', '.update-des', function(){
        $(this).hide();
        $(this).closest('div').find('.update-form').toggleClass('d-none');
    })

    //cancel button of update
    $(document).on('click', '.kk_modal_new_update_cancel', function(){
        $(this).parent('div.update-form').toggleClass('d-none');
        $(this).parent().parent("div").find('.update-des').show();
    })

    
    //update description --save
    $(document).on('submit', '#kk_update_description_form', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')
       
        var thisaddbtn = $(this);
        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('admin/samprotik-description/update')}}",
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
                    // toastr.success(data.message);
                    thisaddbtn.parent().parent("div").find('.update-form').addClass('d-none');
                    thisaddbtn.parent().parent("div").find('.update-des').show();
                    location.reload();
                }

            }
        });
    })


    //get tag
    $(document).on('click', '.get-tag', function() {
        var question_id = $(this).data('question_id')

        var this_input = $(this)
            
        $.ajax({
            type: "GET",
            url: "{{ url('admin/samprotik-tag/get-tag')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                //Assigning value of "val" into "search" variable.
                question_id : question_id,
            },
            //If result found, this funtion will be called.
            success: function(data) {
                //console.log(data)
                this_input.hide();
                this_input.closest('div').find('.tag').html(data);
                
            }
        });
        
    });

    //add tag
    $(document).on('change', '.add-tag', function(){
        var sid = $(this).find(':selected').data('sid');
        var qid = $(this).find(':selected').data('qid');
        
        // console.log(sid)
        // console.log(qid)
        var this_input = $(this)
        
        //AJAX is called.
        $.ajax({
            type: "POST",
            url: "{{ url('admin/samprotik-question/add-tag')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                //Assigning value of "val" into "search" variable.
                subject_id: sid,
                question_id : qid,
            },
            //If result found, this funtion will be called.
            success: function(data) {
                if(data.success){
                    toastr.success(data.message);
                    this_input.hide();
                    $('.get-tag').show();
                }
                else{
                    toastr.error(data.message)
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
                    url: "{{ url('admin/question/samprotik-question/delete') }}"+'/'+id,
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

