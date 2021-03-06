
@extends('layouts.app')
@section('title', 'Bookmark')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Bookmark</h1>
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
                <li class="breadcrumb-item text-dark">Bokkmark</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Bookmark list</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
            
        </div>
        <!--end::Page title-->
        
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Primary button-->
            <button class="btn btn-sm btn-primary" id="readingMode" >Reading Mode</button>
            <button class="btn btn-sm btn-danger d-none" id="testMode">Self Test Mode</button>
            <!--end::Primary button-->
        </div>
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8" >
            <div class="col-xl-10 col-md-10 col-sm-12 col-xs-12 ">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-8 " >
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column ">
                        <!--begin::Row-->
                        <div class="row g-0 d-flex justify-content-center">
                            <!--begin::Col-->
                            <div class="col-12 ">
                                
                                
                            </div>
                            <!--end::Col-->
                            
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
        </div>
       
        <!--end::Row-->
        
       <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
             
            <!--begin::Col-->
            <div class="col-xl-8 col-md-8 col-sm-12 col-xs-12" id="question">
              
                @foreach($bookmarks as $key => $bookmark)
                <!--begin::Feeds Widget 2-->
                    
                <div class="card card-bordered mb-5">
                    <div class="card-header">
                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0" style="max-width: 600px !important;">
                           <a href="{{ route('question.single-question', ['ques_id' => $bookmark->question_id]) }}"> {{ $key+1 }}. {{$bookmark->question->question}}</a>
                          
                        </h3>
                        <div class="card-toolbar">
                           <!--begin::Menu-->
                            <button type="button" class="btn btn-sm btn-light btn-active-light-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Action</button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Question</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Edit Question</a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3 addDescription" data-id="{{ $bookmark->question_id }}" >Add Description</a>
                                </div>
                                <!--end::Menu item-->
                                
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu--> 
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <h3 class="card-title text-black-700 fw-bolder cursor-pointer mb-5">{{$bookmark->question->question}}</h3> --}}
                        <!--end::Text-->
                         <div class="row"  style="font-size: 16px">
                            @if($bookmark->question->question_option->option_1 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5 " > 
                                   <i class="fas fa-eye fa-2xl"></i> {{$bookmark->question->question_option->option_1 }}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($bookmark->question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                   <i class="fas fa-{{ ($bookmark->question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$bookmark->question->question_option->option_1 }}</p>
                            </div>
                            @endif
                           @if($bookmark->question->question_option->option_2 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$bookmark->question->question_option->option_2 }}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($bookmark->question->question_option->answer == '2') ? 'right-answer' : ''}} "> 
                                    <i class="fas fa-{{ ($bookmark->question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$bookmark->question->question_option->option_2 }}</p>
                            </div>
                            @endif
                           @if($bookmark->question->question_option->option_3 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl"></i> {{$bookmark->question->question_option->option_3}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($bookmark->question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($bookmark->question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$bookmark->question->question_option->option_3}}</p>
                            </div>
                            @endif
                           @if($bookmark->question->question_option->option_4 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$bookmark->question->question_option->option_4}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($bookmark->question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($bookmark->question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl" ></i> {{$bookmark->question->question_option->option_4}}</p>
                            </div>
                            @endif
                            @if($bookmark->question->question_option->option_5 != '' )
                            <div class="col-md-6 test">
                                <p class="text-gray-800 fw-normal mb-5  "> 
                                    <i class="fas fa-eye fa-2xl" ></i> {{$bookmark->question->question_option->option_5}}</p>
                            </div>
                            <div class="col-md-6 reading d-none">
                                <p class="text-gray-800 fw-normal mb-5  {{ ($bookmark->question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($bookmark->question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl" ></i> {{$bookmark->question->question_option->option_5}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="">{{$bookmark->question->subject->name}}</a>
                            </button>              
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="">{{$bookmark->question->sub_category->name}}</a>
                            </button>  
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="{{ url('job-solution/', $bookmark->question->sub_category->category->main_category->slug) }}">{{$bookmark->question->sub_category->category->name}}</a>
                            </button>            
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="{{ url('job-solution', $bookmark->question->sub_category->category->main_category->slug) }}">{{$bookmark->question->sub_category->category->main_category->name}}</a>
                            </button>            
                        </div>
                    </div>
                    <div class="card-footer" style="padding-top:0px !important; padding-bottom:0px !important;">
                        <div class="d-flex justify-content-end mt-2" style="margin-bottom: -40px !important;">
                                    <a href="javascript:;" class="removebookmark  me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
                                    data-id="{{ $bookmark->id }}"   title="remove bookmark">
                                    <i class="fas fa-bookmark svg-icon-primary" style="color:#0095E8"></i>
                                </a>
                                <a href="" style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                    <i class="fas fa-eye fa-xl"></i> {{$bookmark->question->view_count}}
                                </a>

                                <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $bookmark->question_id }}" title="like">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <i class="fas fa-heart"></i>
                                <!--end::Svg Icon-->{{$bookmark->question->vote}}</a>
                        </div>
                        <!--begin::Accordion-->
                        <!--begin::Section-->
                        <div class="m-0">
                           
                            <!--begin::Heading-->
                            <div class="d-flex align-items-center  collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_{{$bookmark->question->id}}" aria-expanded="false">
                                <!--begin::Icon-->
                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                            <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon toggle-off svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                   
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <h5 class="text-gray-700 fw-bolder cursor-pointer mb-0">Description</h5>
                                <p class="badge badge-circle badge-success">{{ $bookmark->question->descriptions->count() }}</p>
                                <!--end::Title-->
                                
                                
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div id="kt_job_4_1_{{$bookmark->question->id}}" class="fs-6 ms-1 collapse" style="">
                                @foreach($bookmark->question->descriptions as $description)
                                    @include('question.description')
                                @endforeach
                            </div>
                            <!--end::Content-->
                            
                        </div>
                        <!--end::Section-->
                         <!--end::Accordion-->
                            
                    </div>
                </div>
                <!--end::Feeds Widget 2-->

                <!--begin::Modal - New Description-->
                @include('question.include.add_description_modal')
                <!--end::Modal - New Description-->


                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $bookmarks->links() }}
                </div>
            </div>
            <!--end::Col-->    
            <div class="col-md-4">
                <!--begin::bookmark category card-->
                @include('user.include.bookmark_category')
                <!--end::bookmark category card-->
            </div>
        </div>
        
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->



@endsection


@push('script')
    <script type="text/javascript">
        
        //add description
        $('.addDescription').on('click', function() {
            var id = $(this).data(id)
            console.log(id.id)
            $('input[name="question_id"]').val(id.id)
            $('.with-errors').text('')
            $('#kk_modal_new_question_des_form')[0].reset();
            $('#kk_modal_new_question_des').modal('show')
        });

        //new description save
        $('#kk_modal_new_question_des_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('description/question-description/store')}}",
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
                        $('#kk_modal_new_question_des_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_question_des_form')[0].reset();
                        $("#kk_modal_new_question_des").modal('hide');

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
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
          });

        })
        
            
        //vote
        $('.vote').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/vote')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        showConfirmButton: false
                        
                    })
                    setTimeout(function() {
                        location.reload();  //Refresh page
                    }, 1000);
                }
            })
        });

        //view count
        $('.view').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/view-count')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    
                }
            })
        });

       

        //remove bookmark
        $('.removebookmark').on('click', function() {
            var id = $(this).data(id)
            //console.log(id.id)
            Swal.fire({
                text: "Are you sure you want remove this from bookmark?",
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
                        url: "{{ url('question/bookmark-remove') }}"+'/'+id.id,
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
                                    //refresh page
                                    setTimeout(function () {
                                        location.reload(true);
                                    }, 1000);
                                }))
                            }
                        }
                    });

                }else{ //if cancel
                    Swal.fire({
                        text: "Item has not been removed",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }

            }))
        });

       

        //reading mode
        $(document).ready(function(){
            $('#readingMode').on('click', function(e){
                e.preventDefault();
                $('.test').addClass('d-none')
                $('.reading').removeClass('d-none')
                $(this).addClass('d-none')
                $('#testMode').removeClass('d-none')
        
            })
            $('#testMode').on('click', function(e){
                e.preventDefault();
                $('.test').removeClass('d-none')
                $('.reading').addClass('d-none')
                $('#readingMode').removeClass('d-none')
                $(this).addClass('d-none')
               
            })
        })

       
    </script>
@endpush