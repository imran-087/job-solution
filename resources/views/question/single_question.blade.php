@extends('layouts.app')
@section('title', 'Single Question')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
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
                <li class="breadcrumb-item text-dark">Single Question</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Question Description</li>
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
        
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            

            <!--begin::Col-->
            <div class="col-10" id="question">
              
              
                <!--begin::Feeds Widget 2-->
                    
                <div class="card card-bordered mb-5">
                    <div class="card-header">
                       
                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0" style="max-width: 650px !important;">
                            <a href="{{ route('question.single-question', $question->id) }}"> {{$question->question}}  </a>
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
                                    <a href="{{ route('question.edit-question', $question->id) }}" class="menu-link px-3">Edit Question</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3" onclick="addNew()">Add Description</a>
                                </div>
                                <!--end::Menu item-->
                                
                                <!--begin::Menu item-->
                                {{-- <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div> --}}
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu--> 
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <h3 class="card-title text-black-700 fw-bolder cursor-pointer mb-5">{{$question->question}}</h3> --}}
                        <!--end::Text-->
                        <div class="row" style="font-size: 16px">
                            @if($question->question_option->option_1 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '1') ? 'right-answer' : ''}}" > 
                                    <i class="fas fa-{{ ($question->question_option->answer == '1') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_1 }}
                                </p>

                            </div>
                            @endif
                            @if($question->question_option->option_2 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '2') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '2') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_2 }}
                                </p>
                            </div>
                            @endif
                            @if($question->question_option->option_3 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '3') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '3') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_3 }}
                                </p>
                            </div>
                            @endif
                            @if($question->question_option->option_4 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '4') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '4') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_4 }}
                                </p>
                            </div>
                            @endif
                            @if($question->question_option->option_5 != '')
                            <div class="col-md-6">
                                <p class="text-gray-800 fw-normal mb-5 {{ ($question->question_option->answer == '5') ? 'right-answer' : ''}}"> 
                                    <i class="fas fa-{{ ($question->question_option->answer == '5') ? 'check' : 'times'}} fa-2xl"></i> {{$question->question_option->option_4 }}
                                </p>
                            </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="{{ url('jobs',
                                    [$question->sub_category->category->slug, $question->sub_category->slug, $question->subject->slug]
                                ) }}">{{$question->subject->name}}</a>
                            </button>              
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="">{{$question->sub_category->name}}</a>
                            </button>  
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="{{ url('jobs', $question->sub_category->category->slug) }}">{{$question->sub_category->category->name}}</a>
                            </button>            
                            <button type="button" class="btn btn-sm  btn-light me-3">
                                <a href="">{{$question->sub_category->category->main_category->name}}</a>
                            </button>            
                        </div>
                    </div>
                    <div class="card-footer" style="padding-top:0px !important; padding-bottom:0px !important;">

                        <div class="d-flex justify-content-end mt-2" style="margin-bottom: -40px !important;">
                                <a href="javascript:;" class="comment me-2 btn btn-sm btn-light btn-color-muted btn-active-light-info px-4 py-2"  
                                data-text="comment"  title="Comment">
                                <i class="fas fa-comment"></i>{{$question->comments->count()}}
                                </a>
                                <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
                                    data-id="{{ $question->id }}" data-catid="{{ $question->sub_category->category->id }}" title="bookmark">
                                    <i class="fas fa-bookmark"></i>
                                </a>
                                <a href="" style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                    <i class="fas fa-eye fa-xl"></i> {{$question->view_count}} 
                                </a>

                                <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}" title="like">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <i class="fas fa-heart"></i>
                                <!--end::Svg Icon-->{{$question->vote}}</a>
                        </div>
                        <!--begin::Accordion-->
                        <!--begin::Section-->
                        <div class="m-0">
                           
                            <!--begin::Heading-->
                            <div class="d-flex align-items-center collapsible py-3 toggle mb-0 active" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1_{{$question->id}}" aria-expanded="false">
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
                                <p class="badge badge-light-success fw-bolder">{{ $question->descriptions->count() }}</p>
                                <!--end::Title-->
                                
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div id="kt_job_4_1_{{$question->id}}" class="fs-6 ms-1 collapse show" style="">
    
                                @foreach($question->descriptions as $description)
                                <!--begin::Text-->
                                <div class="card mb-5 mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body pb-0">
                                        <!--begin::Header-->
                                        <div class="d-flex align-items-center mb-2">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-45px me-5">
                                                    <img src="/metronic8/demo1/assets/media/avatars/300-7.jpg" alt="">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column">
                                                    @if($description->approval_id == Null)
                                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $description->admin->name }}</a>
                                                    @else
                                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $description->user->name }}</a>
                                                    @endif
                                                    <span class="text-gray-400 fw-bold">{{$description->created_at->diffForhumans()}}</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                            
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Post-->
                                        <div class="mb-3">
                                            <!--begin::Text-->
                                            <div class="text-gray-800 mb-5">
                                                @if($description->status == 'active')
                                                    {{ $description->description  }}
                                                @endif
                                            </div>
                                            <!--end::Text-->
                                          
                                        </div>
                                        <!--end::Post-->
                                        <!--begin::Separator-->
                                        <div class="separator "></div>
                                        <!--end::Separator-->
                                      
                                    </div>
                                    <!--end::Body-->
                                </div>
                                
                                <!--end::Text-->
                                @endforeach
                            </div>
                            <!--end::Content-->
                            <!--begin::Separator-->
                            {{-- <div class="separator separator-dashed"></div> --}}
                            <!--end::Separator-->
                        </div>
                        <!--end::Section-->
                         <!--end::Accordion-->
                            
                    </div>
                </div>
                <!--end::Feeds Widget 2-->
               <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <div class="mb-7 d-flex justify-content-between">
                            <!--begin::Text-->
                            <div class="text-gray-800 mb-5" style="font-size: 20px"><b>Comments</b></div>
                            <!--end::Text-->
                            <div class="my-0">
                                <a type="button" class=" comment btn btn-sm btn-primary " >
                                   Add Comment
                                </a>
                                
                            </div>
                            
                        </div>
                        
                        <div class="mb-7 ps-10">
                            @foreach($question->comments as $comment)
                            <!--begin::Reply-->
                            <div class="d-flex mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="/metronic8/demo1/assets/media/avatars/300-14.jpg" alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-row-fluid">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center flex-wrap mb-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{$comment->user->name}}</a>
                                        <span class="text-gray-400 fw-bold fs-7">{{$comment->created_at->diffForHumans()}}</span>
                                        
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Post-->
                                    <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $comment->comment }}</span>
                                    <!--end::Post-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Reply-->
                            @endforeach
                        </div>
                      
                        <!--begin::Separator-->
                        {{-- <div class="separator mb-4"></div> --}}
                        <!--end::Separator-->
                        
                    </div>
                    <!--end::Body-->
                </div>

                <!--begin::Modal - New Product/Service-->
                <div class="modal fade" id="kk_modal_new_question_des" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
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
                                <form id="kk_modal_new_question_des_form" class="form" enctype="multipart/form-data">
                                    <div class="messages"></div>
                                    {{-- csrf token  --}}
                                    @csrf
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Add New Question Description</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Question Descrption</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea name="description" class="form-control form-control-solid h-100px"></textarea>
                                        <div class="help-block with-errors description-error"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                </div>
                <!--end::Modal - New Product/Service-->

                <!--begin::Modal - New Product/Service-->
                <div class="modal fade" id="kk_modal_new_comment" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
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
                                <form id="kk_modal_new_comment_form" class="form" enctype="multipart/form-data">
                                    <div class="messages"></div>
                                    {{-- csrf token  --}}
                                    @csrf
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                                    <!--begin::Heading-->
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Add New Comment</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Comment</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea name="comment" class="form-control form-control-solid h-100px"></textarea>
                                        <div class="help-block with-errors comment-error"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" id="kk_modal_new_comment_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                </div>
                <!--end::Modal - New Product/Service-->

               
            </div>
            <!--end::Col-->
           
        </div>
    </div>
</div>
<!---end::Post -->
@endsection

@push('script')
    <script type="text/javascript">
          //add comment
        $(document).ready(function(){
            $('.comment').on('click', function(){
                $('.with-errors').text('')
                $('#kk_modal_new_comment_form')[0].reset();
                $('#kk_modal_new_comment').modal('show')
            })
        })

         //new comment save
        $('#kk_modal_new_comment_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_comment_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('question/comment/store')}}",
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
                        $('#kk_modal_new_comment_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_comment_form')[0].reset();
                        $("#kk_modal_new_comment").modal('hide');

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
                               location.reload()
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_comment_submit').removeAttr('disabled')

                }
          });

        })

        // add new
        function addNew(){
            $('input[name="question_des_id"]').val('')
            $('.with-errors').text('')
            $('#kk_modal_new_question_des_form')[0].reset();
            $('#kk_modal_new_question_des').modal('show')
        }
        
        
        //new category save
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

        

        //bookmarks
        $('.bookmark').on('click', function(){
            var id = $(this).data('id')
            var catid = $(this).data('catid')
           
            $(this).children().addClass('svg-icon-primary');
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('question/bookmark')}}"+'/'+id+'/'+catid,
                dataType: 'json',
                success:function(data){
                    if(data.success){
                        Swal.fire({
                        text: data.message,
                        icon: "success",
                        
                    })
                    }else{
                        Swal.fire({
                        text: data.message,
                        icon: "error",
                        
                        })
                    }
                   
                    
                }
            })
        });

    </script>
@endpush
